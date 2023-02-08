Drupal.behaviors.citizen_legal_topic = {
    attach: function (context, settings) {
        let parent = document.querySelector('#edit-field-parent-topic-0-target-id');
        parent.addEventListener('blur', function (e) {
            let nid = e.target.value.match(/\((\d+)\)/);
            console.log(nid[1]);
            jQuery.ajax({
                url: '/citizen-legal-topic/parent/set/' + nid[1],
            });
        });
    }
}