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
 * <this file contains javascript code for AJAX requests>
 * @author Maxim Korzh <a href="mailto:korj@ascatel.com">&lt; korj@ascatel.com&gt;</a>
 * @version 2013-07-18 15:00:00
 */
 
/**
 * Библиотека предназназначена для совершения AJAX запросов из worker.
 * для работы скрипт требует дополнительные js скрипты, которые должны находится в том же месте, что и ajax_worker.js:
 *   - ajax.js - библиотека, реализующая AJAX запрос
 *   - worker.js - код worker'а
 *
 * Eдинственный метод - 
 *   worker: AJAX.postMessage, который возвращает объект класса worker и, в качестве параметра, принимает следующую JSON структуру:
 *    url: URL,
 *    method: [get, post, ...],
 *    behavior: 'close',
 *    data: JSON
 *    onmessage: function(event){
 *      ...
 *    },
 *    onerror: function(event){
 *      ...
 *    }
 * 
 *  где
 *    url - URL адрес запрашиваемого ресурса
 *    method - метод отправки запроса. реализованы два механизма:
 *      POST - multipart/form-data
 *      GET - через переменные в URL адресе запроса ( этим же механизмом обрабатываются запросы PUT, DELETE, ..., %CUSTOM_METHOD% )
 *      может быть указан любой метод, не вызывающий ошибку. если указанный метод не является POST, данные отправляются через URL адрес
 *    data - передаваемые данные в формате JSON
 *    onmessage - функция, вызываемая при получении сообщения от worker ( происходит как _СОБЫТИЕ_ [event])
 *    onerror - функция, вызываемая при возникновении ошибки ( происходит как _СОБЫТИЕ_ [event])
 *    behavior - ключ, описывающий дейсвия после того, как worker выполнит задачу. если значение определено как close - worker удаляется из страницы как процессю
 *
 *  возвращаемое значение worker помимо стандартных методов имеет метод worker.close(), который удаляет worker
 */

if (!window.Asymbix) window.Asymbix = {};
window.Asymbix.AjaxWorker = (function(params){
  var srcURL = (function(){
    var url = null;
    var scripts = document.getElementsByTagName('script');
    var index = scripts.length;
    var temp = null;

    while (index--){
      temp = scripts[index].src.match(/(.*\W)ajax_worker.js$/);
      if (temp){
        url = temp.pop();
        break;
      }
    }
    
    delete scripts;
    delete index;
    delete temp;
    
    return url;
  })();
  
  this.postMessage = function(params){
	  //alert('asdfg');
    var worker = null;
    if (!params.url) throw('ajax_worker.js - requested url is not defined');
    
    worker = new Worker(srcURL+'worker.js');
    //console.log(worker);
    if (typeof params.onmessage == 'function') worker.onmessage = params.onmessage;
    if (typeof params.onerror == 'function') worker.onerror = params.onerror;

    worker.postMessage({
      url: params.url,
      method: params.method || 'get',
      srcURL: srcURL,
      data: params.data,
      behavior: params.behavior || 'keep'
    });
    
    worker.close = function(){
      this.postMessage({
        behavior: 'close'
      });
    }
    
    return worker;
  }
  
  return this;
})();