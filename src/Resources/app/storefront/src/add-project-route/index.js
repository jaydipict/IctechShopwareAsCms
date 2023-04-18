import Plugin from 'src/plugin-system/plugin.class';
import DomAccess from 'src/helper/dom-access.helper';

export default class addProjectRoute extends Plugin {

    /**
     * Plugin constructor. Finds the necessary elements from the DOM and starts the plugin.
     *
     * @constructor
     * @returns {void}
     */
    init() {
        const customMessage = document.getElementsByClassName('custom-success-msg');
        if(customMessage.length > 0)
        {
            document.getElementsByClassName('custom-success-msg')[0].style.display = "none";
            this.initSubmitSetButton();
        }
    }

    initSubmitSetButton() {
        const submitElement = DomAccess.querySelector(this.el, '[data-product-create-submit]');
        submitElement.addEventListener('click', this._onClickSubmit.bind(this));
    }

    _onClickSubmit(event) {
        event.preventDefault();
        this.submitForm();
    }

    submitForm(){
        var http = new XMLHttpRequest();
        var url = document.getElementsByClassName("projectURL");
        url = url[0].value;
        var firstName = document.querySelector('#form-firstName').value;
        var email = document.querySelector('#form-email').value;
        var phone = document.querySelector('#form-phone').value;
        var subject = document.querySelector('#form-subject').value;
        var description = document.querySelector('#form-description').value;

        var params = 'firstName=' + firstName + '&email=' + email + '&phone=' + phone + '&subject=' + subject + '&description=' + description;
        // var params = {
        //     'firstName': firstName,
        //     'email': email,
        //     'phone': phone,
        //     'subject': subject,
        //     'description': description
        // }

        http.open('POST', url, true);
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        http.onload = function () {
            let res = JSON.parse(this.response);
            if (res[0].type === 'success' && this.status === 200) {
                document.getElementsByClassName('custom-success-msg')[0].style.display = "block";
                document.getElementsByClassName('custom-cms-form')[0].style.display = "none";
            }
        }
        http.send(params);
    }
}
