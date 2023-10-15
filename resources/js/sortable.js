import { Sortable } from 'sortablejs';

var current = document.getElementById('current-func');
var progress = document.getElementById('progress-func');
var finished = document.getElementById('finished-func');
Sortable.create(current, {
    ghostClass: "bg-green-400",
    dragClass: "bg-gray-400",  // Class name for the dragging item
    Animation: 150,
    group: { name: 'current', pull: true, put: true },
    onChange: function (evt) {

        evt.item.childNodes[1].classList.remove('text-yellow-400');
        evt.item.childNodes[1].classList.remove('text-green-400');
        evt.item.childNodes[1].classList.add('text-red-400');
        evt.item.childNodes[1].classList.remove('fa-check');
        evt.item.childNodes[1].classList.add('fa-circle');
        window.dispatchEvent(new Event("start-function"))
    }

});
Sortable.create(progress, {
    group: { name: 'progress', pull: true, put: true },
    onChange: function (evt) {
        evt.item.childNodes[1].classList.remove('text-green-400');
        evt.item.childNodes[1].classList.remove('text-red-400');
        evt.item.childNodes[1].classList.add('text-yellow-400');
        evt.item.childNodes[1].classList.add('fa-circle');
        evt.item.childNodes[1].classList.remove('fa-check');
        window.dispatchEvent(new Event("start-progress-function"))
    }
});
Sortable.create(finished, {
    group: { name: 'finished', pull: true, put: true },
    onChange: function (evt) {
        evt.item.childNodes[1].classList.remove('text-green-400');
        evt.item.childNodes[1].classList.remove('text-yellow-400');
        evt.item.childNodes[1].classList.add('text-green-400');

        evt.item.childNodes[1].classList.remove('fa-circle');
        evt.item.childNodes[1].classList.add('fa-check');
        window.dispatchEvent(new Event("finish-function"))
    }
});

