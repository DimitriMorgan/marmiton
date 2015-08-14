angular.module('ui.dropzone', [])
  .value('utils', {
    closest: function closest(el, selector) {
      if(!el) return null;

      var target = el;
      var i;

      while(target.parentNode && !target.matches(selector)) {
        target = target.parentNode;
      }

      if(target.parentNode) {
        return target;
      }
      else {
        return false;
      }
    }
  })
  .run([ 'utils', function(utils) {
    var closest = utils.closest;
    var zone, dragged, displaced, displacedRect;

    document.addEventListener('drag', function(e) {
      if(!displaced) return;

      //  If we're dragging on the lower half of a draggable, then the drop will
      //  go after the current displaced
      if(displacedRect.top + displacedRect.height/2 < e.pageY) {
        displaced.classList.remove('dropzone-displaced');
        if(displaced.nextElementSibling === dragged) return;
        //  keep displaced value if no sibling to displace (used when dropping)
        displaced = displaced.nextElementSibling || displaced;
        displacedRect = displaced && displaced.getBoundingClientRect() || null;
        return displaced && displaced.classList.add('dropzone-displaced');
      }
      //  If we're within the top half of displaced, nothing changes
      else {
        displaced.classList.add('dropzone-displaced');
      }
    });

    document.addEventListener('dragstart', function(e) {
      dragged = e.target;
    });

    document.addEventListener('dragend', function(e) {});

    document.addEventListener('dragover', function(e) {
      e.preventDefault();
    });

    document.addEventListener('dragenter', function(e) {
      var target = closest(e.target, '[dropzone]');
      if(!target) return;
      var droppables = target.querySelectorAll('[droppable]');
      var listEl, rect, i;

      if(displaced && !target.contains(displaced)) {
        displaced.classList.remove('dropzone-displaced');
        displaced = displacedRect = null;
      }

      for(i = 0; i < droppables.length; i++) {
        listEl = droppables[i];
        if(listEl === dragged) continue;

        rect = listEl.getBoundingClientRect();

        //  items will only be displaced "down" (as in we're dropping before)
        if(rect.bottom > e.pageY) {
          displaced = listEl;
          displacedRect = listEl.getBoundingClientRect();
          displaced.classList.add('dropzone-displaced');
          break;
        }
        else {
          displaced = null;
        }
      }

      zone = target;
    });

    document.addEventListener('dragleave', function(e) {
      var zone = closest(e.target, '[dropzone]');
      if(!zone) return;

      var droppables = zone.querySelectorAll('[droppable]');
      for(var i = 0; i < droppables.length; i++) {
        droppables[i].classList.remove('dropzone-displaced');
      }
    });

    document.addEventListener('drop', function(e) {
      var oldListEls = closest(dragged, '[dropzone]').children;
      var newListEls = zone.children;
      var i, fromIndex, toIndex;

      for(i = 0; i < oldListEls.length; i++) {
        if(oldListEls[i] === dragged) fromIndex = i;
      }

      for(i = 0; i < newListEls.length; i++) {
        if(newListEls[i] === displaced) {
          toIndex = i;
          break;
        }
        if(i === newListEls.length-1) toIndex = i+1;
      }
      
      var removedEvent = new CustomEvent('dropzone-remove', {
        bubbles: true,
        cancelable: true,
        detail: {
          fromIndex: fromIndex,
          toIndex: toIndex,
          dropzone: zone
        }
      });

      dragged.dispatchEvent(removedEvent);

      if(displaced) displaced.classList.remove('dropzone-displaced');
      zone = displaced = displacedRect = dragged = null;
    });
  }])
  .directive('droppable', ['utils', function(utils) {
    return {
      restrict: 'A',
      link: function(scope, element) {
        var el = element[0];

        element.attr('draggable', true);
        element[0]._dropzone = utils.closest(element[0], '[dropzone]');
      }
    };
  }])
  .directive('dropzone', ['utils', function() {
    return {
      restrict: 'A',
      scope: {
        model: '=ngModel'
      },
      link: function(scope, element) {
        var el = element[0];

        element.on('dropzone-add', function(e) {
          var detail = e.detail || e.originalEvent.detail;

          element.children().removeClass('dropzone-displaced');
          scope.$emit('dropzone-add', detail);
          scope.$apply(function(scope) {
            scope.model.splice(detail.index, 0, detail.data[0]);
          });
        });

        element.on('dropzone-remove', function(e) {
          var detail = e.detail || e.originalEvent.detail;

          var addEvent = new CustomEvent('dropzone-add', {
            bubbles: true,
            cancelable: true,
            detail: {
              index: detail.toIndex,
              data: scope.model.splice(detail.fromIndex, 1)
            }
          });

          scope.$emit('dropzone-remove', detail);
          detail.dropzone.dispatchEvent(addEvent);
        });
      }
    };
  }]);