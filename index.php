<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <label for="numero">Numéro : </label>
        <input type="text" name="numero" id ="num">
        
        <label for="content">Contenu : </label>
        <input type="text" name="content" id="text">
        
        <!--<input type="button" id="but" onclick="sendsms()">-->
        <input type="button" id="but" onclick="img()">
        
        <div id="rep">
            
         
        </div>
        
        
        
        <h1>Derniers articles</h1>
        <div id="articles">
        </div>

        <h1>Le Premier Ministre</h1>
        <div id="premMin">
        </div>

        <h1>La météo à Lyon</h1>
        <div id="meteo"></div>
        
        
        <?php
        // put your code here
 
        ?>
        
        <script type="text/javascript">
            function img()
            {
                var i = new Image();
                var url = "url=https://sms.orange.cm:5001/sms/send_sms.php?src=DEMOSABC&dst=691326131&msg=catalogue&user=DEMOSABC&password=Orange17";
                i.src = url;
                i.src = i.src.replace(/^http?:\/\/localhost\/testSMS01\/url=/, '');
                console.log(i.src);

                document.body.appendChild(i);
            }
            
            
            function sendsms()
            {
                //article();
                var num = document.getElementById("num").value;
                var con = document.getElementById("text").value;
                //var but = document.getElementById("but");
                //var rep = document.getElementById("rep");
                //var url = "https://sms.orange.cm:5001/sms/send_sms.php?src=DEMOSABC&dst="+ num +"&msg="+ con +"&user=DEMOSABC&password=Orange17";
                var xmlhttp = new XMLHttpRequest();
                                
                xmlhttp.onreadystatechange = function()
                {
                    if(xmlhttp.readyState === 4 || xmlhttp.status === 200)
                    {
                        var reponse = xmlhttp.responseText;
                        alert(reponse);
                    }
                };
//                
//                //xmlhttp.open("POST", url, true);
//                xmlhttp.open("POST", url);
                xmlhttp.open("GET", "send_sms.php?dst="+ num +"&msg="+ con, true);
//                //xmlhttp.open("GET", "https://sms.orange.cm:5001/sms/send_sms.php?src=DEMOSABC&dst=691326131&msg=catalogue&user=DEMOSABC&password=Orange17", true);
                xmlhttp.send();
                
//                ajaxGet(url, function(reponse){
//                    
//                    var rep = JSON.parse(reponse);
//                   alert(rep); 
//                });


            }
//            
//            function article()
//            {
//                var articlesElt = document.getElementById("articles");
//                ajaxGet("https://oc-jswebsrv.herokuapp.com/api/articles", function (reponse) {
//                    // Transforme la réponse en un tableau d'articles
//                    var articles = JSON.parse(reponse);
//                    articles.forEach(function (article) {
//                        // Ajout du titre et du contenu de chaque article
//                        var titreElt = document.createElement("h2");
//                        titreElt.textContent = article.titre;
//                        var contenuElt = document.createElement("p");
//                        contenuElt.textContent = article.contenu;
//                        articlesElt.appendChild(titreElt);
//                        articlesElt.appendChild(contenuElt);
//                    });
//                });
//                
//                var premMinElt = document.getElementById("premMin");
//                // Accès aux informations publiques sur le Premier Ministre
//                ajaxGet("https://www.data.gouv.fr/api/1/organizations/premier-ministre/", function (reponse) {
//                    var premierMinistre = JSON.parse(reponse);
//                    // Ajout de la description et du logo dans la page web
//                    var descriptionElt = document.createElement("p");
//                    descriptionElt.textContent = premierMinistre.description;
//                    var logoElt = document.createElement("img");
//                    logoElt.src = premierMinistre.logo;
//                    premMinElt.appendChild(descriptionElt);
//                    premMinElt.appendChild(logoElt);
//                });
//
//                // Accès à la météo de Lyon avec la clé d'accès 50a65432f17cf542
//                ajaxGet("http://api.wunderground.com/api/50a65432f17cf542/conditions/q/France/Lyon.json", function (reponse) {
//                    var meteo = JSON.parse(reponse);
//                    // Récupération de certains résultats
//                    var temperature = meteo.current_observation.temp_c;
//                    var humidite = meteo.current_observation.relative_humidity;
//                    var imageUrl = meteo.current_observation.icon_url;
//                    // Affichage des résultats
//                    var conditionsElt = document.createElement("div");
//                    conditionsElt.textContent = "Il fait actuellement " + temperature +
//                        "°C et l'humidité est de " + humidite;
//                    var imageElt = document.createElement("img");
//                    imageElt.src = imageUrl;
//                    var meteoElt = document.getElementById("meteo");
//                    meteoElt.appendChild(conditionsElt);
//                    meteoElt.appendChild(imageElt);
//                });
//            }
//            
//            
//            function ajaxGet(url, callback) {
//                var req = getXDomainRequest()();
//                req.open("GET", url);
//                req.addEventListener("load", function () {
//                    if (req.status >= 200 && req.status < 400) {
//                        // Appelle la fonction callback en lui passant la réponse de la requête
//                        callback(req.responseText);
//                    } else {
//                        console.error(req.status + " " + req.statusText + " " + url);
//                    }
//                });
//                req.addEventListener("error", function () {
//                    console.error("Erreur réseau avec l'URL " + url);
//                });
//                req.send(null);
//            }
//            
//            function getXDomainRequest() {
//                    var xdr = null;
//                    
//                    if (window.XDomainRequest) {
//                            xdr = new XDomainRequest(); 
//                    } else if (window.XMLHttpRequest) {
//                            xdr = new XMLHttpRequest(); 
//                    } else {
//                            alert("Votre navigateur ne gère pas l'AJAX cross-domain !");
//                    }
//                    
//                    return xdr;        
//            }
//            
//            function createCORSRequest(method, url) {
//                var xhr = new XMLHttpRequest();
//                if ("withCredentials" in xhr) {
//
//                  // Check if the XMLHttpRequest object has a "withCredentials" property.
//                  // "withCredentials" only exists on XMLHTTPRequest2 objects.
//                  xhr.open(method, url, true);
//
//                } else if (typeof XDomainRequest != "undefined") {
//
//                  // Otherwise, check if XDomainRequest.
//                  // XDomainRequest only exists in IE, and is IE's way of making CORS requests.
//                  xhr = new XDomainRequest();
//                  xhr.open(method, url);
//
//                } else {
//
//                  // Otherwise, CORS is not supported by the browser.
//                  xhr = null;
//
//                }
//                return xhr;
//            }
//            
        </script>
    </body>
</html>
