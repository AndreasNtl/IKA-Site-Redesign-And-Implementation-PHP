var startDate,
        endDate,
        updateStartDate = function () {
            startPicker.setStartRange(startDate);
            endPicker.setStartRange(startDate);
            endPicker.setMinDate(startDate);
        },
        updateEndDate = function () {
            startPicker.setEndRange(endDate);
            startPicker.setMaxDate(endDate);
            endPicker.setEndRange(endDate);
        },
        startPicker = new Pikaday({
            field: document.getElementById('start'),
            minDate: new Date(1990, 01, 01),
            maxDate: new Date(2030, 12, 31),
            format: 'YYYY/MM/DD',
            onSelect: function () {
//                            console.log(this.getMoment().format('Do YYYY/MM/DD'));
                startDate = this.getDate();
                updateStartDate();
            }
        }),
        endPicker = new Pikaday({
            field: document.getElementById('end'),
            minDate: new Date(),
            maxDate: new Date(2030, 12, 31),
            format: 'YYYY/MM/DD',
            onSelect: function () {
//                            console.log(this.getMoment().format('Do YYYY/MM/DD'));
                endDate = this.getDate();

                updateEndDate();
            }
        }),
        _startDate = startPicker.getDate(),
        _endDate = endPicker.getDate();

if (_startDate) {
    startDate = _startDate;
    updateStartDate();
}

if (_endDate) {
    endDate = _endDate;
    updateEndDate();
}