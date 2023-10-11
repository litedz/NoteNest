import { Sortable } from 'sortablejs';

var current = document.getElementById('current-func');
var progress = document.getElementById('progress-func');
Sortable.create(current, {
    ghostClass: "bg-green-400",
    dragClass: "bg-gray-400",  // Class name for the dragging item
    Animation:150,
    group: { name: 'current', pull: true, put: true },
    onChange: function(evt) {
		
        evt.item.childNodes[1].classList.remove('text-yellow-400')
        evt.item.childNodes[1].classList.add('text-red-400')
	}

});
Sortable.create(progress, {
    group: { name: 'progress', pull: true, put: true },
    onChange: function(evt) {
        evt.item.childNodes[1].classList.remove('text-green-400')
        evt.item.childNodes[1].classList.add('text-yellow-400')
	}
});