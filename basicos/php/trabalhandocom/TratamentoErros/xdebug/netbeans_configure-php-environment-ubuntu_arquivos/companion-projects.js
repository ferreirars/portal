/*
 * This is the rotation sript for the Companion Projects section
 *
 * we hase some limited number of static items whcih are displayed always and
 * the rest is rendered randomly
 */
function renderCompanionProjectIcons() {
  /* number of items we want to render */
  var itemsToRender = 3;

  /* domain where images live - we can easily switch for local testing to localhost to see images */
  var domain = "http://www.netbeans.org"; // http://localhost

  /* links output */
  var randomizedLinks = "";
  var staticLinks = "";

  /* items definition using JSON object notation */
  var staticItemsContainer = {
    "items" : [
    {
      "image": "/images/v6/mysql_logo.gif",
      "link": "http://www.mysql.com/",
      "alt": "MySQL - Open Source Database Server",
      "width": "58",
      "height": "30"
    },
    {
      "image": "/images/v6/glassfish.gif",
      "link": "https://glassfish.dev.java.net/",
      "alt": "GlassFish Community: an Open Source Application Server",
      "width": "55",
      "height": "35"
    },
    {
      "image": "/images/v6/opensolaris.gif",
      "link": "http://opensolaris.org/",
      "alt": "Open Solaris",
      "width": "95",
      "height": "17"
    },
    {
      "image": "/images/v6/projectkenai.gif",
      "link": "http://kenai.com/",
      "alt": "Project Kenai",
      "width": "119",
      "height": "22"
    }
    ]
  }
  var randItemsContainer = {
    "items" : [
    {
      "image": "/images/v6/zembly.gif",
      "link": "http://zembly.com/",
      "alt": "Zembly",
      "width": "73",
      "height": "22"
    },
    {
      "image": "/images/v6/mobile-duke.gif",
      "link": "http://community.java.net/mobileandembedded/",
      "alt": "Mobile & Embedded Community",
      "width": "37",
      "height": "35"
    },
    {
      "image": "/images/v6/openjdk.gif",
      "link": "https://openjdk.dev.java.net/",
      "alt": "Open JDK: an Open SourceJDK",
      "width": "63",
      "height": "19"
    },
    {
      "image": "/images/v6/vbox.gif",
      "link": "http://www.virtualbox.org/wiki/VirtualBox",
      "alt": "Virtual Box - full virtualizer",
      "width": "108",
      "height": "35"
    },

    {
      "image": "/images/v6/open-esb.gif",
      "link": "https://open-esb.dev.java.net/",
      "alt": "Open ESB - The Open Enterprise Service Bus",
      "width": "90",
      "height": "30"
    },

    {
      "image": "/images/v6/javanet.gif",
      "link": "http://www.java.net/",
      "alt": "Java.net - The Source for Java Technology Collaboration",
      "width": "80",
      "height": "36"
    },

    {
      "image": "/images/v6/open-office.gif",
      "link": "http://www.openoffice.org/",
      "alt": "OpenOffice - The free and open productivity suite",
      "width": "111",
      "height": "35"
    }
    ]
  };

  /* opening and closing html chunks */
  var openingHtml="<center><table><tr><td class=\"companions-left b-green-left valign-center\">Companion <br>Projects: </td><td  class=\"valign-center\">";
  var closingHtml="<td class=\"companions-right b-green-right valign-center align-center\">&nbsp;Sponsored&nbsp;by&nbsp;<br><a href=\"http://www.sun.com/\"><img src=\""+domain+"/images/v6/sun-logo.gif\" width=\"61\" height=\"26\" alt=\"Sponsored by Sun Microsystems\" title=\"Sponsored by Sun Microsystems\"></a></td></tr></table></center>";

  /* let's stup the sttaic links */
  for (i=0; i<staticItemsContainer.items.length; i++) {
    staticLinks += '<td class="valign-center"><a href="'+staticItemsContainer.items[i].link+'"><img src="'+domain+staticItemsContainer.items[i].image+'" alt="'+staticItemsContainer.items[i].alt+'" title="'+staticItemsContainer.items[i].alt+'" width="'+staticItemsContainer.items[i].width+'" height="'+staticItemsContainer.items[i].height+'"></a>&nbsp;&nbsp;</td>';
  }

  /* now randomize the rand items array */
  randItemsContainer.items.sort(function() {
    return (Math.round(Math.random())-0.5)
  });

  /* make sure we do not want to display more items then we actually have */
  itemsToRender = (itemsToRender > randItemsContainer.items.length)? randItemsContainer.items.length : itemsToRender ;

  /* now setup randomized items */
  for (i = 0; i < itemsToRender; i++) {
    // setup the style - there is line after the last item
    var style = (i==(itemsToRender-1))? 'class="valign-center b-green-right" style="padding-right:10px;"' : 'class="valign-center"' ;
    var space = (i==(itemsToRender-1))? '' : '&nbsp;';
    randomizedLinks += '<td '+style+'><a href="'+randItemsContainer.items[i].link+'"><img src="'+domain+randItemsContainer.items[i].image+'" alt="'+randItemsContainer.items[i].alt+'" title="'+randItemsContainer.items[i].alt+'" width="'+randItemsContainer.items[i].width+'" height="'+randItemsContainer.items[i].height+'"></a>'+space+'</td>';
  }
  
  /* return the html */
  return openingHtml+staticLinks+randomizedLinks+closingHtml;
}

/**
* function which renders randomly 2 links to the Sun Support Program pane in kb/rcol
*/
function renderRandomSupportLinks() {
  // JSON objects holding links and urls for the rendering
  var links={
    "items":[

    {
      "link":"Sun Developer Expert Assistance",
      "url":"http://developers.sun.com/services/expertassistance/index.jsp?intcmp=2287"
    },

    {
      "link":"Sun Software Service Plans for Developers",
      "url":"http://www.sun.com/service/developertools/index.jsp?intcmp=2288"
    },

    {
      "link":"Sun Developer Services Buying Guide",
      "url":"http://developers.sun.com/services/SDS_Buying_Guide_053107.html?intcmp=2290"
    },

    {
      "link":"Get Sun Developer Expert Assistance Now",
      "url":"http://globalspecials.sun.com/store/sunstor/DisplayProductDetailsPage/productID.105292300?intcmp=2291"
    },

    {
      "link":"Get Sun Software Service Plan Now",
      "url":"http://globalspecials.sun.com/servlet/ControllerServlet?productID=56041400&Action=DisplayPage&SiteID=sunstor&id=ProductDetailsPage&intcmp=2292"
    },
    ]
  };

  // setup rand counter
  var rand1 = Math.floor(Math.random() * links.items.length);
  var rand2 = rand1;
  do {
    rand2 = Math.floor(Math.random() * links.items.length);
  }
  while(rand1 == rand2)


  // now render the links according to rand counters
  document.write("<div class=\"rrrarticle\"><div class=\"rarticletitle\"><a href=\""+links.items[rand1].url+"\">"+links.items[rand1].link+"</a></div></div>");
  document.write("<div class=\"rrrarticle\"><div class=\"rarticletitle\"><a href=\""+links.items[rand2].url+"\">"+links.items[rand2].link+"</a></div></div>");
}
