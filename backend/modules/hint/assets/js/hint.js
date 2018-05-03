function Hint()
{
    const self = this;
    this.pageName = location.pathname;
    this.controllerUrl = '/hint/default/get-hint';
    this.hintsAllArray = [];
    this.mainHintsAllArray = [];
    this.option = [];

    /**
     * Показ хинтов
     * @param hints все хинты или один хинт
     * @returns void
     */
    this.run = function() {
        const hints = self.mainHintsAllArray,
            intro = introJs();
        var step;

        if (Array.isArray(hints)) {
            step = hints;
        }

        intro.setOptions({
            steps: step,
            nextLabel: self.option.nextLabel,
            prevLabel: self.option.prevLabel,
            skipLabel: self.option.skipLabel,
            doneLabel: self.option.doneLabel,
            hidePrev: true,
            hideNext: true,
            overlayOpacity: 0.2
        });

        intro.start();
    }

    this.getAllHintsThisPage = function() {
        $.ajax({
            url: this.controllerUrl + '?page_name=' + this.pageName,
            method: 'get',
            dataType: 'json',
            success: function(response) {
                if (response) {
                    self.option = response.option;
                    delete response['option'];

                    var result = $.map(response, function(value, index) {
                        return [value];
                    });

                    result.sort(function(a, b) {
                        return a.step - b.step;
                    });

                    result.forEach(function(item_hint) {
                        if (item_hint.message == '') {
                            return;
                        }
                        self.hintsAllArray.push(item_hint);
                    });
                    self.setHint(true);
                }
            }

        });
    }

    this.setHint = function(innerCall) {
        if (innerCall) {
            this.hintsAllArray.forEach(function(item_hint) {
                var element = document.getElementById(item_hint.element_id);

                if (self.isElementVisible(element)) {
                    self.mainHintsAllArray.push(self.stepObjectHints(item_hint));
                }

            });
        }
    }

    this.isElementVisible = function(element) {
        var result = false;
        if (element) {
            if ($(element).attr('type') != 'hidden' || $(element).is(':visible')) {
                result = true;
            }
        }
        return result;
    }

    this.stepObjectHints = function(hint) {
        const customStepObj = {};
        customStepObj.intro = hint.message;
        customStepObj.element = document.getElementById(hint.element_id);
        if (hint.position) {
            customStepObj.position = hint.position;
        }

        return customStepObj;
    }
};

const hint = new Hint();
hint.getAllHintsThisPage();

$(document).ready(function() {
    $('body').on('click', '#hintRun', function (e) {
        e.preventDefault()

        if (hint.mainHintsAllArray.length > 0) {
            hint.run();
        }
    });
})