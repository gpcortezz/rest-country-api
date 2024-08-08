let timeNow = new Date();
    
// Queremos que la hora se muestre siempre con 2 dígitos. Para eso, hacemos lo siguiente:
// Usamos un ternario para saber si el número de digitos es menor que 2
let hours = timeNow.getHours().toString().length < 2 ? "0" + timeNow.getHours() : timeNow.getHours();
let minutes = timeNow.getMinutes().toString().length < 2 ? "0" + timeNow.getMinutes() : timeNow.getMinutes();
let seconds = timeNow.getSeconds().toString().length < 2 ? "0" + timeNow.getSeconds() : timeNow.getSeconds();

//  Concatenando variables | Usando ES5 
// let mainTime = hours + ":" + minutes + ":" + seconds;
 //  Concatenando variables | Usando ES6: Template Strings (Template literals) 
let mainTime = `${hours}:${minutes}:${seconds}`;
console.log(mainTime);
document.write(mainTime);


// Initialize and add the map
// let latitud=document.querySelectorAll(".latitud");
// console.log(latitud[0].textContent);
// let longitud=document.querySelectorAll(".longitud");
// console.log(longitud[0].textContent);

// for(let i=1;i<3;i++){
//     console.log(latitud[i].textContent);
//     console.log(longitud[i].textContent);
// }

// function mapas(){
// let mapa=document.getElementById("mapa");
// mapa.addEventListener("click",function (){
//     alert("Mapa aqui");
// })


//}


// // function initMap() {

//     // The location of Uluru
//     const uluru = { lat: 44.43, lng: 26.1 };
//     // The map, centered at Uluru
//     const map = new google.maps.Map(document.getElementById("map"), {
//       zoom: 15,
//       center: uluru,
//     });
//     // The marker, positioned at Uluru
//     const marker = new google.maps.Marker({
//       position: uluru,
//       map: map,
//     });
// //   }
  
// //   window.initMap = initMap;