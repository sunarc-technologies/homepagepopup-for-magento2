require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function(
        $,
        modal
    ) {
        $(document).ready(function ()
        {
            var options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                buttons: [{
                    text: $.mage.__('Close'),
                    class: 'mymodal1',
                    click: function ()
                    {
                        this.closeModal();
                    }
                }]};
            var popup = modal(options, $('#popup-modal'));

            setTimeout(function()
            { $("#popup-modal").modal("openModal"); }, 1000);

        })
    }
);
