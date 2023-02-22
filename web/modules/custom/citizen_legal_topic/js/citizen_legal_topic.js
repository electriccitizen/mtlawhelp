Drupal.behaviors.citizen_legal_topic = {
    attach: function (context, settings) {
        let parent = document.querySelector('#edit-field-parent-topic-0-target-id');
        let subtopic = document.querySelector('#edit-field-legal-topic-0-target-id');

        // On field focus, set the parent_nid if the parent field is available.
        subtopic.addEventListener('focus', function (e) {
            let parent_val = parent.value.match(/\((\d+)\)/);
            let parent_nid = parent_val ? parent_val[1] : 0;
            jQuery.ajax({
                url: '/citizen-legal-topic/parent/set/' + parent_nid,
            });
        })
        // On field blur, set the parent_nid value to 0.
        subtopic.addEventListener('blur', function (e) {
            jQuery.ajax({
                url: '/citizen-legal-topic/parent/set/0',
            });
        });
    }
}