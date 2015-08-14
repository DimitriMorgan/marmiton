# DROPZONE - Simple drag and drop that works.
Angular directive for simple drag and drop functionality.

## Install
`$> bower install angular-ui-dropzone`

## Usage
Two attributes are all ya need -- but you'll probably want to use all three.

### Attribute `dropzone`
Designates the element as a "droppable zone". Any `droppable` element can be dropped here.

### Attribute `ng-model` (optional)
Add this to a `dropzone` element in which to track the items. Various models will remain in sync, no worries there

### ATTRIBUTE `droppable`
**Must be a `dropzone` descendant** - a draggable element that can be dropped into a `dropzone`

## Events
### `dropzone-add`
### `dropzone-remove`

## Example
```html
<div class="col" ng-repeat="col in columns" ng-model="columns[$index]" dropzone>
    <div ng-repeat="item in col" droppable>
        <h4>{{item.name}}</h4>
    </div>
</div>

<script>
ng.app('dropzone-test-app', ['ui.dropzone'])
    .module('main', function($scope) {
        $scope.columns = [
            [ { name: 'Droppable Item 1' } ],
            [ { name: 'Droppable Item 2'}, { name: 'Droppable Item 3' } ]
        ];

        $scope.on('dropzone-add', function(scope, dropzoneAddEvent) {
            dropzoneAddEvent.index // the index where data was added
            dropzoneAddEvent.data // the value via the model
        });

        $scope.on('dropzone-remove', function(scope, dropzoneRemoveEvent) {
            dropzoneRemoveEvent.fromIndex   // old index from last dropzone
            dropzoneRemoveEvent.toIndex // new index in new dropzone
        });
    });
</script>
```

## TODO
- More layout controls (reduce immediate child node dependencies)
