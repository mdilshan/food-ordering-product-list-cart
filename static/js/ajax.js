"use strict"
/**
 * Send asynchronous network request
 * @param {string} method - method of the http request
 * @param {string} url - url, where we expect to send the request
 * @param {Object} data - javascript object which conteins data to send with post request
 * @returns {Promise<JSON>} sending or recieving json data as async network request
 */
const ajax = (method, url, data) => {
    const promise = new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open(method, url);
        if(data){
            xhr.setRequestHeader('Content-Type', 'application/json');
        }
        xhr.onload = () => {
            if(xhr.status >= 400){
                reject(JSON.parse(xhr.response));
            }else{
                console.log(xhr.response);
                resolve(JSON.parse(xhr.response));
            }
        }
        xhr.onerror = () => {
            reject('Something went wrong. Please check your internet connection');
        };

        xhr.send(JSON.stringify(data))
    });
    return promise;
}