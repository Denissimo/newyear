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
 * @version 2013-07-17 15:00:00
 */
 
/**
 * Библиотека предназназначена для AJAX запросов через объект XMLHTTPRequest.
 *
 * Имеется единственный метод - AJAX.request, который в качестве параметра принимает следующую JSON структуру:
 *   url: URL,
 *   method: [get, post, ...],
 *   async: BOOLEAN,
 *   data: JSON,
 *   onsuccess: function(data){
 *     ...
 *   },
 *   onerror: function(data){
 *     ...
 *   } 
 * 
 *  где
 *    url - [обязательный параметр] - URL адрес запрашиваемого ресурса
 *    method - метод отправки запроса. реализованы два механизма:
 *      POST - multipart/form-data
 *      GET - через переменные в URL адресе запроса ( этим же механизмом обрабатываются запросы PUT, DELETE, ..., %CUSTOM_METHOD% )
 *      может быть указан любой метод, не вызывающий ошибку. если указанный метод не является POST, данные отправляются через URL адрес
 *    async - асинхронный запрос или нет. в Web Workers должны использоваться только синхронные запросы
 *    data - передаваемые данные в формате JSON
 *    onsuccess - callback функция, вызываемая при успешном выполнении запроса
 *    onerror - callback функция для обработки ошибок, возникших в ходе выполнения запроса
 *
 */

// поскольку библиотека предназначена для Web Workers, использование объекта window не представляется возможным
var Ajax = (function(){
  var self = null;
 
  var getFormat = function(method){
    return (method == 'post') ? 
      (function(){
        var boundary = 'XMLHTTPRequestBoundary'+new Date().valueOf();
        return {
          contentType: 'multipart/form-data; charset=UTF-8; boundary='+boundary,
          separator: '',
          getKeyValue: function(key, value){
            return '--'+boundary+'\r\nContent-Disposition: form-data; name="'+key+'"\r\n\r\n'+value+'\r\n';
          }
        }
      })() :
      (function(){
        return {
          contentType: 'text/plain; charset=UTF-8',
          separator: '&',
            getKeyValue: function(key, value){
            return key+'='+encodeURIComponent(value);
          }
        }
      })();
  }
  
  var getData = function(hash){
    var result = [];
    
    if (hash){
      if ((typeof hash == 'object') && !(hash instanceof Array)) for (var key in hash) result.push(formatData(key, hash[key]));
      else throw('ajax.js - wrong data format');
    }
    
    return result.join(self.format.separator);
  }
  
  var formatData = function(key, value){
    var result = [];
    var index = null;
    
    if (value instanceof Array){
      index = value.length;
      while (index--) result.push(arguments.callee(key+'['+index+']', value[index]));
    }
    else if (typeof value == 'object') for (index in value) result.push(arguments.callee(key+'['+index+']', value[index]));
    else result.push(self.format.getKeyValue(key, value));
    
    delete index;
    
    return result.join(self.format.separator);
  }
  
  var setOptions = function(options){
    var temp = null;
    
    self = options;
    if (!self.method) self.method = 'get';
    self.method = self.method.toLowerCase();
    self.format = getFormat(self.method);
    
    self.data = getData(self.data);
    if (self.method != 'post'){
      temp = self.url.split('?').pop();
      if (temp == self.url) self.url += '?';
      else self.url = self.url.replace(/&$/, '')+'&';
      
      self.url += self.data;
      self.data = null;
    }
    
    delete temp;
  }
  
  this.request = function(options){
    setOptions(options);
    if (self.url){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open(self.method, self.url, !!self.async);
      xmlhttp.onreadystatechange = function(){
        if (xmlhttp.readyState == 4){
          if(xmlhttp.status == 200) if (typeof self.onsuccess == 'function') self.onsuccess(xmlhttp.responseText);
          else if(/(?:4|5)\d{2}/.test(xmlhttp.status) && typeof self.error == 'function') self.onerror('HTTP status code is '+xmlhttp.status);

          setTimeout(function(){
            xmlhttp.abort();
            xmlhttp = null;
            self = null;
          }, 0);
        }
      }
      
      xmlhttp.setRequestHeader('Content-Type', self.format.contentType);
      xmlhttp.send(self.data);
    }
    else throw('ajax.js - url not defined');
  }
  
  return this;
})();