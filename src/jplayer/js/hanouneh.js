$(document).ready(function(){

  var myPlaylist = new jPlayerPlaylist({
      },
      [
        {
          title:"1. Getting ready for the war",
          mp3: "/audio/live-session-ep-hanouneh-the-awakening-band/1-Getting-ready-for-war.mp3",
        },
        {
          title:"2. Leave you behind",
          mp3: "/audio/live-session-ep-hanouneh-the-awakening-band/2-Leave-you-behind.mp3",
        },
        {
          title:"3. New Zion",
          mp3: "/audio/live-session-ep-hanouneh-the-awakening-band/3-New-Zion.mp3",
        },
        {
          title:"4. Simple Love",
          mp3: "/audio/live-session-ep-hanouneh-the-awakening-band/4-Simple-Love.mp3",
        },
        {
          title:"5. Police inna mi yard",
          mp3: "/audio/live-session-ep-hanouneh-the-awakening-band/5-Police-inna-mi-yard.mp3",
        },
        {
          title:"6. Mot ljuset",
          mp3: "/audio/live-session-ep-hanouneh-the-awakening-band/6-Mot-ljuset.mp3",
        },
      ],
      {
        swfPath: "/js/",
        supplied: "mp3",
        wmode: "window",
  });

});