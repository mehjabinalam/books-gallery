/** Notice * This file contains works from many authors under various (but compatible) licenses. Please see core.txt for more information. **/
(function(){(window.wpCoreControlsBundle=window.wpCoreControlsBundle||[]).push([[13],{322:function(Da,ta,aa){aa.r(ta);var oa=aa(2),ja=aa(0);aa.n(ja);var la=aa(1),da=aa(108);Da=aa(40);var y=aa(65),x=aa(175),w=aa(47),f=aa(174);aa=aa(268);var a=window,e=function(){function ba(r,h,z){var ca=-1===r.indexOf("?")?"?":"&";switch(h){case w.a.NEVER_CACHE:this.url=r+ca+"_="+Object(ja.uniqueId)();break;default:this.url=r}this.Od=z;this.request=new XMLHttpRequest;this.request.open("GET",this.url,!0);this.request.setRequestHeader("X-Requested-With",
"XMLHttpRequest");this.request.overrideMimeType?this.request.overrideMimeType("text/plain; charset=x-user-defined"):this.request.setRequestHeader("Accept-Charset","x-user-defined");this.status=f.a.NOT_STARTED}ba.prototype.start=function(r,h){var z=this,ca=this,ha=this.request,ea;ca.ir=0;r&&Object.keys(r).forEach(function(ia){z.request.setRequestHeader(ia,r[ia])});h&&(this.request.withCredentials=h);this.Cw=setInterval(function(){var ia=0===window.document.URL.indexOf("file:///");ia=200===ha.status||
ia&&0===ha.status;if(ha.readyState!==f.b.DONE||ia){try{ha.responseText}catch(fa){return}ca.ir<ha.responseText.length&&(ea=ca.t0())&&ca.trigger(ba.Events.DATA,[ea]);0===ha.readyState&&(clearInterval(ca.Cw),ca.trigger(ba.Events.DONE))}else clearInterval(ca.Cw),ca.trigger(ba.Events.DONE,["Error received return status "+ha.status])},1E3);this.request.send(null);this.status=f.a.STARTED};ba.prototype.t0=function(){var r=this.request,h=r.responseText;if(0!==h.length)if(this.ir===h.length)clearInterval(this.Cw),
this.trigger(ba.Events.DONE);else return h=Math.min(this.ir+3E6,h.length),r=a.BI(r,this.ir,!0,h),this.ir=h,r};ba.prototype.abort=function(){clearInterval(this.Cw);var r=this;this.request.onreadystatechange=function(){Object(la.i)("StreamingRequest aborted");r.status=f.a.ABORTED;return r.trigger(ba.Events.ABORTED)};this.request.abort()};ba.prototype.finish=function(){var r=this;this.request.onreadystatechange=function(){r.status=f.a.SUCCESS;return r.trigger(ba.Events.DONE)};this.request.abort()};ba.Events=
{DONE:"done",DATA:"data",ABORTED:"aborted"};return ba}();Object(Da.a)(e);var b;(function(ba){ba[ba.LOCAL_HEADER=0]="LOCAL_HEADER";ba[ba.FILE=1]="FILE";ba[ba.CENTRAL_DIR=2]="CENTRAL_DIR"})(b||(b={}));var n=function(ba){function r(){var h=ba.call(this)||this;h.buffer="";h.state=b.LOCAL_HEADER;h.eD=4;h.Ni=null;h.oo=da.c;h.Lj={};return h}Object(oa.c)(r,ba);r.prototype.o0=function(h){var z;for(h=this.buffer+h;h.length>=this.oo;)switch(this.state){case b.LOCAL_HEADER:this.Ni=z=this.z0(h.slice(0,this.oo));
if(z.Ro!==da.g)throw Error("Wrong signature in local header: "+z.Ro);h=h.slice(this.oo);this.state=b.FILE;this.oo=z.fz+z.bm+z.uq+this.eD;this.trigger(r.Events.HEADER,[z]);break;case b.FILE:this.Ni.name=h.slice(0,this.Ni.bm);this.Lj[this.Ni.name]=this.Ni;z=this.oo-this.eD;var ca=h.slice(this.Ni.bm+this.Ni.uq,z);this.trigger(r.Events.FILE,[this.Ni.name,ca,this.Ni.sz]);h=h.slice(z);if(h.slice(0,this.eD)===da.h)this.state=b.LOCAL_HEADER,this.oo=da.c;else return this.state=b.CENTRAL_DIR,!0}this.buffer=
h;return!1};r.Events={HEADER:"header",FILE:"file"};return r}(x.a);Object(Da.a)(n);Da=function(ba){function r(h,z,ca,ha,ea){ca=ba.call(this,h,ca,ha)||this;ca.url=h;ca.stream=new e(h,z);ca.Oc=new n;ca.VK=window.createPromiseCapability();ca.pL={};ca.Od=ea;return ca}Object(oa.c)(r,ba);r.prototype.Tr=function(h){var z=this;this.request([this.Rg,this.Rh,this.Qg]);this.stream.addEventListener(e.Events.DATA,function(ca){try{if(z.Oc.o0(ca))return z.stream.finish()}catch(ha){throw z.stream.abort(),z.sq(ha),
h(ha),ha;}});this.stream.addEventListener(e.Events.DONE,function(ca){z.X_=!0;z.VK.resolve();ca&&(z.sq(ca),h(ca))});this.Oc.addEventListener(n.Events.HEADER,Object(ja.bind)(this.oL,this));this.Oc.addEventListener(n.Events.FILE,Object(ja.bind)(this.Q0,this));return this.stream.start(this.Od,this.withCredentials)};r.prototype.zI=function(h){var z=this;this.VK.promise.then(function(){h(Object.keys(z.Oc.Lj))})};r.prototype.mk=function(){return!0};r.prototype.request=function(h){var z=this;this.X_&&h.forEach(function(ca){z.pL[ca]||
z.A4(ca)})};r.prototype.oL=function(){};r.prototype.abort=function(){this.stream&&this.stream.abort()};r.prototype.A4=function(h){this.trigger(y.a.Events.PART_READY,[{Qa:h,error:"Requested part not found",kg:!1,ze:!1}])};r.prototype.Q0=function(h,z,ca){this.pL[h]=!0;this.trigger(y.a.Events.PART_READY,[{Qa:h,data:z,kg:!1,ze:!1,error:null,ac:ca}])};return r}(y.a);Object(aa.a)(Da);Object(aa.b)(Da);ta["default"]=Da}}]);}).call(this || window)
