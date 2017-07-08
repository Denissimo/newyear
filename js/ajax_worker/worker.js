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
 * Код worker, который отправляет AJAX запрос.
 * для работы скрипт требует дополнительные js скрипты, которые должны находится в том же месте, что и worker.js
 *   - ajax_worker.js - обёртка, реализующая отправку и возвращение данных
 *   - ajax.js - библиотека, реализующая AJAX запрос
 */

onmessage = function(event){
  var params = event.data;
  
  if (params.url){
    importScripts(params.srcURL+'ajax.js');
    
    Ajax.request({
      url: params.url,
      async: false,
      method: params.method,
      data: params.data,
      onsuccess: function(data){
        postMessage(data);
        if (params.behavior == 'close') self.close();
      },
      onerror: function(data){
        throw(data)
      }
    });
  }
  else if (params.behavior == 'close') self.close();
  else throw('worker.js - not enough parameters');
};
