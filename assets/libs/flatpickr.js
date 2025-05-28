import {French} from 'flatpickr/dist/l10n/fr.js';
import flatpickr from "flatpickr";

flatpickr.localize(French);

const baseConfig = {
    disableMobile: true,
    locale: French,
    time_24hr: true,
};

const dateConfig = {
    ...baseConfig,
    altInput: true,
    altFormat: "j F Y",
    dateFormat: "Y-m-d",
};

const dateTimeConfig = {
    ...baseConfig,
    enableTime: true,
    noCalendar: false,
    dateFormat: "Y-m-d H:i",
    altInput: true,
    altFormat: "j F Y \\à H\\hi",
};

const customConfigs = [
    {selector: ".flatpickr-date-input", options: {...dateConfig}},
    {selector: ".flatpickr-datetime", options: {...dateTimeConfig}},
];

customConfigs.forEach(config => {
    flatpickr(config.selector, config.options);
});

