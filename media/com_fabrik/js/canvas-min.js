var Canvas=new Class({Implements:[Options],options:{tabs:["page1"],tabelement:"",pagecontainer:"packagepages",editable:false},initialize:function(a){this.setOptions(a);Fabrik.addEvent("fabrik.page.insert",function(b){this.insertPage(b)}.bind(this));this.iconGen=new IconGenerator({scale:0.5});this.pages=new Pages(this.options.pagecontainer,this.options.editable);this.tabs=new Tabs(this.options.tabelement,this.options.tabs,this.options.editable)},setup:function(){this.pages.fromJSON(this.options.layout)},setDrags:function(){$("typeList").getElements("li").each(function(a){a.addEvent("mousedown",function(c){var d=a.clone().setStyles(a.getCoordinates()).store("type",a.retrieve("type")).setStyles({opacity:0.7,position:"absolute"}).addEvent("emptydrop",function(){a.dispose()}).inject(document.body);var b=d.makeDraggable({droppables:this.drops,onComplete:function(){this.detach()},onEnter:function(e,f){f.tween("background-color","#98B5C1")},onLeave:function(e,f){f.tween("background-color","#fff")},onDrop:function(e,f){if(f){this.insertLocation=e.getCoordinates(f);this.openListWindow(e.retrieve("type"));f.tween("background-color","#fff")}d.dispose()}.bind(this)});b.start(c)}.bind(this))}.bind(this))},setDrops:function(a){this.options.tabs=this.tabs.tabs.getKeys();this.drops=this.pages.getHTMLPages()}});
