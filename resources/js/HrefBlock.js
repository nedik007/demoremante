export default class HrefBlock{
    constructor() {

        $(document).on('click', '[data-block]', this.onClick);
        $(document).on('click', '[data-block-all] a', this.onClick);
    }

    onClick(e) {
        e.preventDefault();

        alert('Toto je jen demo, tyto akce jsou blokované');
    }

}
