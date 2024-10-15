function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return atob(c.substring(name.length, c.length));
        }
    }

    return "";
}
var _BearerToken =  getCookie('BearerToken');
const headers = new Headers({
  'Accept': 'application/json',
  'Authorization': `Bearer ${_BearerToken}`
});
fetch('http://127.0.0.1:8002/api/check-Bearer-token', {
  method: 'GET',
  headers: headers
})
  .then(response => {
    if (response.status == 401) {

     window.location.href = "/";

      } 
  })
  .then(data => {
      
  })
  .catch(error => {
   
  });