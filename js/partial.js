/*
 * Copyright© 2012 Ascatel Inc.. All rights reserved.
 *
 * It is a part of Asymbix project.
 * Licensed under the Asymbix project License, Version 1.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.asymbix/licenses/LICENSE-1.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the full volume of permissions and
 * limitations under the License.
 */

/**
 * @class dropdownMenu
 * <this file contains javascript code for calendar>
 * @author Maxim Korzh <a href="mailto:korj@ascatel.com">&lt; korj@ascatel.com&gt;</a>
 * @version 2013-08-12 17:00:00
 */
 
/**
 *  для работы скрипта необходима библиотека jQuery ( разработка веласьт с использованием jQuery v1.10.1 )
 *
 *  window.Asymbix.Partial содержит два метода
 *    .getFromString(PARTIAL_AS_STRING) - получает шаблон как строку
 *    .getByURL(PARTIAL_URL) - загружает шаблон из указаного URL с помощью AJAX
 *                             каждый загруженный шаблон сохраняется в памяти и, при последующих попытках его загрузить возвращается из кэша
 *
 *  оба метода возвращают один единственный метод:
 *    .fetch(DATASET, CALLBACK), где
 *      DATASET - набор подставляемых в шаблон данных
 *      CALLBACK - функция вызываемая после обработки шаблона
 *
 *  если шаблон в странице как HTML фрагмент, то он должен быть обрамлён в тэг <script> c несуществующим MIME-типом, напрмер
 *  <script type="text/pattern">...</script>
 *  это обусловлено тем, что из HTML "<" и ">" читаются как "&lt;" и "&gt;"
 *
 *
 *  оформление шаблонов.
 *  для построение логических и пр. конструкция в шаблоне используется JavaScript, обрамлённый "<%" и "%>". несколько строк, желательно не объеденять в один блок, поскольку при наличии непонятных для JS символов или слов, 
 *  будет сгенерирована ошибка.
 *  
 *  <%= user.age %>       "=" - вывод переменной
 *  <%@ root/user.tpl %>  "@" - подключение части шаблона
 *  <% ... %> - код, интерпретируемый, как JavaScript
 *
 *  пример шаблона:
 *  <script type="text/pattern" id="source">
 *    <h1><%= data.caption %></h1>
 *    <p><%@ info.tpl %></p>
 *    <ul>
 *    <% for ( var i = 0; i < data.users.length; i++ ){ %>
 *      <%@ item.tpl %>
 *    <% } %>
 *    </ul>
 *  </script>
 *
 *  пример использования:
 *  <script type="text/javascript">
 *    var result = document.getElementById('result');
 *    var result1 = document.getElementById('result1');
 *    var source = document.getElementById('source');
 *    if (result){
 *      Partial.getFromString(source.innerHTML).fetch(
 *        dataSet,
 *        function(string){
 *          result.innerHTML = string;
 *        }
 *      );
 *    }
 *    
 *    Partial.getByURL('full.tpl').fetch(dataSet, function(string){
 *      result1.innerHTML = string;
 *    });
 *  </script> 
 *    
 */

if (!window.Asymbix) window.Asymbix = {};
window.Asymbix.Partial = new function(){
  var DEFAULT_PARTIAL = 'Partial is not found';
  var RESPONSE_TIMEOUT = 1000;

  var cache = {};
  var current = null;

  var prepare = function(string){
    return string.replace(/[\r\t\n]/g, " ").split(/<%\s*/).join("\t").replace(/((^|%>)[^\t]*)'/g, "$1\r");
  }
  
  var parse = function(parsedData){
    return (new Function("obj",
      "var p=[],print=function(){p.push.apply(p,arguments);};" +
      "with(obj){p.push('" +
      prepare(current)
        .replace(/\t@\s*(.*?)\s*%>/g, function(dummy, patternName){
          return prepare(cache[patternName]);
        })
        .replace(/\t=\s*(.*?)%>/g, "',$1,'")
        .split("\t").join("');")
        .split("%>").join("p.push('")
        .split("\r").join("\\'")
    + "');}return p.join('');"))(parsedData || {});
  }        
  
  var fetch = function(dataToFetch, callback){
    var count = 0;
    var index = 0;
    var temp = '';
    
    includes = prepare(current).match(/\t@\s*.*?\s*%>/g);
    if (includes){
      count = index = includes.length;
      
      while (index--){
        temp = includes[index].replace(/(?:\t@|\s+|%>)/g, '');
        if (cache[temp]) count--;
        else{
          (function(key){
            $.ajax({
              type: 'get',
              url: key,
              timeout: RESPONSE_TIMEOUT,
              success: function(partial){
                count--;
                cache[key] = partial;
                if (!count && typeof callback == 'function') callback(parse(dataToFetch));
              },
              error: function(jqXHR, textStatus, errorThrown){
                count--;
                cache[key] = errorThrown || textStatus;
                if (!count && typeof callback == 'function') callback(parse(dataToFetch));
              }
            });
          })(temp);
        }
      }
    }
    
    if (!count && typeof callback == 'function') callback(parse(dataToFetch));
    
    delete index;
    delete temp;
  }
  
  this.getByName = function(partialName){
    current = (cache[partialName]) ? cache[partialName] : DEFAULT_PARTIAL;
    
    return {
      fetch: fetch
    }
  }
  
  this.getByURL = function(partialURL){
    var deffered = $.ajax({
      type: 'get',
      url: partialURL,
      timeout: RESPONSE_TIMEOUT,
      success: function(partial){
        current = cache[partialURL] = partial;
      },
      error: function(jqXHR, textStatus, errorThrown){
        current = cache[partialURL] = errorThrown || textStatus;
      }
    });
    
    return {
      fetch: function(data, callback){
        var callbackWrapper = function(){
          fetch(data, callback)
        }
        
        deffered.done(callbackWrapper).fail(callbackWrapper);
      }
    }
  }
  
  this.getFromString = function(partialAsString){
    current = partialAsString;
    
    return {
      fetch: fetch
    }
  }
}