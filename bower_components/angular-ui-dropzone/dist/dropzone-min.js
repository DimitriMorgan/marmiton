angular.module("ui.dropzone",[]).value("utils",{closest:function(e,n){if(!e)return null;for(var t=e;t.parentNode&&!t.matches(n);)t=t.parentNode;return t.parentNode?t:!1}}).run(["utils",function(e){var n,t,o,d,r=e.closest;document.addEventListener("drag",function(e){if(o){if(d.top+d.height/2<e.pageY){if(o.classList.remove("dropzone-displaced"),o.nextElementSibling===t)return;return o=o.nextElementSibling||o,d=o&&o.getBoundingClientRect()||null,o&&o.classList.add("dropzone-displaced")}o.classList.add("dropzone-displaced")}}),document.addEventListener("dragstart",function(e){t=e.target}),document.addEventListener("dragend",function(){}),document.addEventListener("dragover",function(e){e.preventDefault()}),document.addEventListener("dragenter",function(e){var i=r(e.target,"[dropzone]");if(i){var a,l,c,s=i.querySelectorAll("[droppable]");for(o&&!i.contains(o)&&(o.classList.remove("dropzone-displaced"),o=d=null),c=0;c<s.length;c++)if(a=s[c],a!==t){if(l=a.getBoundingClientRect(),l.bottom>e.pageY){o=a,d=a.getBoundingClientRect(),o.classList.add("dropzone-displaced");break}o=null}n=i}}),document.addEventListener("dragleave",function(e){var n=r(e.target,"[dropzone]");if(n)for(var t=n.querySelectorAll("[droppable]"),o=0;o<t.length;o++)t[o].classList.remove("dropzone-displaced")}),document.addEventListener("drop",function(){var e,i,a,l=r(t,"[dropzone]").children,c=n.children;for(e=0;e<l.length;e++)l[e]===t&&(i=e);for(e=0;e<c.length;e++){if(c[e]===o){a=e;break}e===c.length-1&&(a=e+1)}var s=new CustomEvent("dropzone-remove",{bubbles:!0,cancelable:!0,detail:{fromIndex:i,toIndex:a,dropzone:n}});t.dispatchEvent(s),o&&o.classList.remove("dropzone-displaced"),n=o=d=t=null})}]).directive("droppable",["utils",function(e){return{restrict:"A",link:function(n,t){t[0];t.attr("draggable",!0),t[0]._dropzone=e.closest(t[0],"[dropzone]")}}}]).directive("dropzone",["utils",function(){return{restrict:"A",scope:{model:"=ngModel"},link:function(e,n){n[0];n.on("dropzone-add",function(t){var o=t.detail||t.originalEvent.detail;n.children().removeClass("dropzone-displaced"),e.$emit("dropzone-add",o),e.$apply(function(e){e.model.splice(o.index,0,o.data[0])})}),n.on("dropzone-remove",function(n){var t=n.detail||n.originalEvent.detail,o=new CustomEvent("dropzone-add",{bubbles:!0,cancelable:!0,detail:{index:t.toIndex,data:e.model.splice(t.fromIndex,1)}});e.$emit("dropzone-remove",t),t.dropzone.dispatchEvent(o)})}}}]);