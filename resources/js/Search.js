export default class Search {
    constructor() {

        $(document).on('submit', '.search', this.onSubmit);
    }

    onSubmit(e) {
        let value = $(e.currentTarget).find('input').val();
        if (value === '') {
            e.preventDefault();
        }
    }
}
