
var mct1_Options =
{
    sliderId: "mcts1",
    direction: "horizontal",
    scrollInterval: 1400,
    scrollDuration: 800,
    hoverPause: true,
    autoAdvance: true,
    scrollByEachThumb: true,
    circular: true,
    largeImageSlider: null,
    inSyncWithLargeImageSlider: true,
    license: "mylicense"
};

var thumbnailSlider = new ThumbnailSlider(mct1_Options);
/* Menucool Thumbnail Slider v2012.11.22. Copyright www.menucool.com */
function ThumbnailSlider(e){var g="length",i="className",R=function(a,c){var b=a[g];while(b--)if(a[b]===c)return true;return false},S=function(b,a){return R(b[i].split(" "),a)},L=function(a,b){if(!S(a,b))if(a[i]=="")a[i]=b;else a[i]+=" "+b},J=function(a,b){var c=new RegExp("(^| )"+b+"( |$)");a[i]=a[i].replace(c,"$1");a[i]=a[i].replace(/ $/,"")},N=function(b,c){var a=null;if(typeof b.currentStyle!="undefined")a=b.currentStyle;else a=document.defaultView.getComputedStyle(b,null);return a[c]},q="largeImageSlider",s="appendChild",D="inSyncWithLargeImageSlider",u=function(d){var a=d.childNodes,c=[];if(a)for(var b=0,e=a[g];b<e;b++)a[b].nodeType==1&&c.push(a[b]);return c},X=function(b,c){var a=c==0?b.nextSibling:b.firstChild;while(a&&a.nodeType!=1)a=a.nextSibling;return a},P=function(a,c,b){if(a.addEventListener)a.addEventListener(c,b,false);else a.attachEvent&&a.attachEvent("on"+c,b)},j="style",k="offsetTop",l="offsetLeft",t="offsetHeight",A="offsetWidth",x="onmouseover",w="onmouseout",C=function(){this.b=[];this.c=null;this.d()};function K(){var c=50,b=navigator.userAgent,a;if((a=b.indexOf("MSIE "))!=-1)c=parseInt(b.substring(a+5,b.indexOf(".",a)));return c}var U=K()<9,E=K()<8;C.a={g:function(a){return-Math.cos(a*Math.PI)/2+.5},h:function(a){return a},i:function(b,a){return Math.pow(b,a*2)},j:function(b,a){return 1-Math.pow(1-b,a*2)}};var W=["$1$2$3","$1$2$3","$1$24","$1$23"];C.prototype={k:{b:e.scrollDuration,a:function(){},e:C.a.g,d:1},d:function(){for(var b=["webkit","moz","ms","o"],a=0;a<b[g]&&!window.requestAnimationFrame;++a){window.requestAnimationFrame=window[b[a]+"RequestAnimationFrame"];window.cancelAnimationFrame=window[b[a]+"CancelAnimationFrame"]||window[b[a]+"CancelRequestAnimationFrame"]}this.supportAnimationFrame=!!window.requestAnimationFrame},m:function(h,d,g,c){for(var b=[],i=g-d,j=g>d?1:-1,f=Math.ceil(60*c.b/1e3),a,e=1;e<=f;e++){a=d+c.e(e/f,c.d)*i;if(h!="opacity")a=Math.round(a);b.push(a)}b.index=0;return b},n:function(){this.c==null&&this.o()},o:function(){this.p();var a=this;this.c=this.supportAnimationFrame?window.requestAnimationFrame(function(){a.o()}):window.setInterval(function(){a.p()},15)},p:function(){var a=this.b[g];if(a){for(var c=0;c<a;c++)this.q(this.b[c]);while(a--){var b=this.b[a];if(b.c.index==b.c[g]){b.d();this.b.splice(a,1)}}}else{if(this.supportAnimationFrame)window.cancelAnimationFrame(this.c);else window.clearInterval(this.c);this.c=null}},q:function(a){if(a.c.index<a.c[g]){var c=a.b,b=a.c[a.c.index];if(a.b=="opacity"){if(U){c="filter";b="alpha(opacity="+Math.round(b*100)+")"}}else b+="px";a.a[j][c]=b;a.c.index++}},r:function(e,b,d,f,a){a=this.s(this.k,a);var c=this.m(b,d,f,a);this.b.push({a:e,b:b,c:c,d:a.a});this.n()},s:function(c,b){b=b||{};var a,d={};for(a in c)d[a]=b[a]!==undefined?b[a]:c[a];return d}};var Q=new C;function O(b){var a=[],c=b[g];while(c--)a.push(String.fromCharCode(b[c]));return a.join("")}var a={a:0,b:0,c:0,d:0,e:1,f:0},h,c,b,o,f,d,B,y,m,n,p,r,z,v,M=function(a){o=a;b=[];this.b()},H=function(){h=e.direction=="vertical"?0:1;c={a:e.license,b:e.scrollInterval,c:e.autoAdvance,d:e.scrollByEachThumb,e:e.circular,Ob:function(){typeof beforeThumbChange!=="undefined"&&beforeThumbChange(arguments)},Oa:function(){typeof afterThumbChange!=="undefined"&&afterThumbChange(arguments)}};y&&y.c()},T=document,V=[/(?:.*\.)?(\w)([\w\-])[^.]*(\w)\.[^.]+$/,/.*([\w\-])\.(\w)(\w)\.[^.]+$/,/^(?:.*\.)?(\w)(\w)\.[^.]+$/,/.*([\w\-])([\w\-])\.com\.[^.]+$/],G=function(b){var a=document.createElement("div");if(b)a[i]=b;a[j].display="block";return a},F=function(b){var a=document.createElement("a");a[i]=b;return a};M.prototype={b:function(){d=G(0);d[j][h?"width":"height"]="99999px";d[j].position="relative";f=G(0);f[s](d);f[j].position="relative";f[j].overflow="hidden";if(!h){f[j].height=o[t]+"px";o[j].height="auto"}o.insertBefore(f,o.firstChild);for(var r=u(o),c,w,x,m=1,v=r[g];m<v;m++){c=G("item");c[s](r[m]);if(h){c[j].cssFloat="left";c[j].styleFloat="left"}if(e[q]){c[j].cursor="pointer";c.onclick=function(){if(e[D]){a.a=this.i;y.f(1,1)}else e[q].displaySlide(this.i,1,0)}}b.push(d[s](c));b[b[g]-1].i=m-1}a.b=b[g];if(h)n=b[0][l];else{n=N(b[0],"marginTop");if(n=="auto"||!n)n=0;else n=parseInt(n)}if(b[g]>1)var p=h?b[1][l]-b[0][l]-b[0][l]-b[0][A]:b[1][k]-b[0][k]-b[0][t];var i=b[b[g]-1];B=h?i[l]+i[A]+p:i[k]+i[t]+p;d[j][h?"width":"height"]=B+"px";this.c();o[j].backgroundImage="none"},c:function(){var b=this.n();if(b[0]){if(p==null)b[1].g();else{z[i]=c.c?"navPause":"navPlay";p[i]="navPrev";r[i]="navNext"}!c.e&&this.s();if(c.c)m=setTimeout(function(){b[1].e()},c.b);if(e.hoverPause){f[x]=function(){a.d=1;clearTimeout(m);m=null};f[w]=function(){a.d=0;if(m==null&&!a.c&&c.c){window.clearTimeout(m);m=null;m=setTimeout(function(){b[1].e()},c.b/2)}};if(p){r[x]=p[x]=f[x];r[w]=p[w]=f[w]}}else f[x]=f[w]=function(){}}if(e[q]){e[q].getElement()[x]=f[x];e[q].getElement()[w]=f[w];e[D]&&e[q].getAuto()&&e[q].changeOptions({autoAdvance:false})}},d:function(){a.c=0;clearTimeout(m);m=null;if(c.e)this.m();else{this.s();if(!a.e)return}var b=this;if(!a.d&&c.c)m=setTimeout(function(){b.e()},c.b);c.Oa.call(this,a.a)},e:function(){var b=this.l();if(b!=null){a.a=b;this.f(0,1)}},f:function(m,o){a.c=1;c.d&&this.h();if(h)var i="left",f=d[l],g=n-b[a.a][l];else{i="top";if(E)f=d[k];else f=d[k]-n;if(E)g=n-b[a.a][k];else g=-b[a.a][k]}var p=function(){y.d()};c.Ob.call(this,a.a);var j=Math.abs(f-g);Q.r(d,i,f,g,{b:e.scrollDuration,a:p,e:C.a.j,d:j>500?1.5:j>240?1.2:1});e[q]&&(e[D]||m)&&e[q].displaySlide(a.a,1,o)},g:function(){var d=this;if(c.d){v=document.createElement("div");v[i]="navBullets";for(var f=[],b=0;b<a.b;b++)f.push("<a rel='"+b+"'></a>");v.innerHTML=f.join("");for(var e=u(v),b=0;b<a.b;b++){if(b==a.a)e[b][i]="active";e[b].onclick=function(){if(this[i]=="active")return 0;if(a.c)return 0;d.j(parseInt(this.getAttribute("rel")))}}o[s](v)}p=F("navPrev");p.setAttribute("onselectstart","return false");p.onclick=function(){d.To(1)};o[s](p);z=F(c.c?"navPause":"navPlay");z.setAttribute("onselectstart","return false");z.setAttribute("title",c.c?"Pause":"Play");z.onclick=function(){window.clearTimeout(m);m=null;(c.c=!c.c)&&d.e();this[i]=c.c?"navPause":"navPlay";this.setAttribute("title",c.c?"Pause":"Play")};o[s](z);r=F("navNext");r.setAttribute("onselectstart","return false");r.onclick=function(){d.To(0)};o[s](r)},h:function(){if(v){var c=u(v),b=c[g];while(b--)if(b==a.a)c[b][i]="active";else c[b][i]=""}},i:function(a,d){var c=function(b){var a=b.charCodeAt(0).toString();return a.substring(a[g]-1)},b=d.replace(V[a-2],W[a-2]).split("");return"b"+a+b[1]+c(b[0])+c(b[2])},j:function(b){a.a=this.r(b);window.clearTimeout(m);m=null;this.f(0,0)},k:function(a){return a.replace(/(?:.*\.)?(\w)([\w\-])?[^.]*(\w)\.[^.]*$/,"$1$3$2")},To:function(d){if(a.c)return;if(d){var b=this.o();if(!c.e&&a.a==0)return;if(b==null)return;else a.a=b}else{b=this.l();if(b==null)return;else a.a=b}window.clearTimeout(m);m=null;this.f(0,0)},l:function(){if(!c.e&&!a.e)return null;var i=this.p(a.a);if(!c.e&&i<a.a)return a.a;if(!c.d){var e=i,j=u(d);while(true){if(h&&b[e][l]-b[a.a][l]>f[A])break;else if(!h&&b[e][k]-b[a.a][k]>f[t])break;if(e==j[j[g]-1].i)break;i=e;e=this.p(e)}return i}return i},m:function(){for(var e=u(d),c=0,f=e[g];c<f;c++)if(e[c].i==a.a)break;else d[s](e[c]);if(h)d[j].left=n-b[a.a][l]+"px";else if(E)d[j].top=n-b[a.a][k]+"px";else d[j].top=-b[a.a][k]+"px"},n:function(){return(new Function("a","b","c","d","e","f","g","h","var noEnoughRoom=d>(h?c.offsetWidth:c.offsetHeight);var l=e(g(b([110,105,97,109,111,100])));if(l==''||l.length>3||a[b([97])]==f((+a[b([97])].substring(1,2)),g(b([110,105,97,109,111,100])))){return [noEnoughRoom, this];}else{return [1,{g:function(){},e:function(){}}];}")).apply(this,[c,O,f,B,this.k,this.i,function(a){return T[a]},h])},o:function(){if(c.e){var i=u(d),m=i[i[g]-1].i;if(!c.d)for(var e=i[g]-1;e>-1;e--){if(h&&B-i[e][l]>f[A])break;else if(!h&&B-i[e][k]>f[t])break;m=i[e].i}for(var e=i[g]-1;e>-1;e--){d.insertBefore(i[e],X(d,1));if(i[e].i==m)break}if(h)d[j].left=n-b[a.a][l]+"px";else d[j].top=n-b[a.a][k]+"px"}else{if(!a.f)return null;m=this.q(a.a);if(!c.d)for(var e=m;e>-1;e--){if(h&&b[a.a][l]-b[e][l]>f[A]||!h&&b[a.a][k]-b[e][k]>f[t])break;m=b[e].i}}return m},p:function(a){return this.r(++a)},q:function(a){return this.r(--a)},r:function(b){if(b>=a.b)b=0;else if(b<0)b=a.b-1;return b},s:function(){a.f=(h?d[l]:d[k])<0;if(a.f)J(p,"navPrevDisabled");else L(p,"navPrevDisabled");a.e=(h?d[l]-f[A]:d[k]-f[t])+B>0;if(a.e)J(r,"navNextDisabled");else L(r,"navNextDisabled")}};var I=function(){var a=document.getElementById(e.sliderId);if(a&&u(a)[g]&&a[t])y=new M(a);else setTimeout(I,900)};H();P(window,"load",I);return{displaySlide:function(a){y.j(a)},changeOptions:function(a){for(var b in a)e[b]=a[b];H()}}}