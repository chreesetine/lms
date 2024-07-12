let btnMenu = document.querySelector('#btnMenu')
let sidebar = document.querySelector('.sidebar')
let mainContent = document.querySelector('main-content')

btnMenu.onclick = function () {
    sidebar.classList.toggle('active')
    mainContent.classList.toggle('active')
};

//contents
const pickupOrders = 25;
    const deliveryOrders = 15;
    const rushOrders = 10;

    document.getElementById('pickup-orders').textContent = pickupOrders;
    document.getElementById('delivery-orders').textContent = deliveryOrders;
    document.getElementById('rush-orders').textContent = rushOrders;

//CALENDAR     
document.addEventListener('DOMContentLoaded', () => {
    const yearElement = document.getElementById('year');
    const prevYearBtn = document.getElementById('prevYear');
    const nextYearBtn = document.getElementById('nextYear');
    const monthsElement = document.getElementById('months');
    const calendarElement = document.getElementById('calendar');
    const servicesElement = document.getElementById('services');

    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth();

    const months = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    function generateMonths() {
        monthsElement.innerHTML = '';
        months.forEach((month, index) => {
            const monthElement = document.createElement('div');
            monthElement.className = 'month';
            monthElement.textContent = month;
            monthElement.addEventListener('click', () => {
                generateCalendar(currentYear, index);
            });
            monthsElement.appendChild(monthElement);
        });
    }

    function generateCalendar(year, month) {
        calendarElement.innerHTML = '';

        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        daysOfWeek.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.textContent = day;
            calendarElement.appendChild(dayElement);
        });

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'empty';
            calendarElement.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateCell = document.createElement('div');
            dateCell.className = 'date';
            dateCell.textContent = day;
            calendarElement.appendChild(dateCell);
        }
    }

    function updateYearDisplay() {
        yearElement.textContent = currentYear;
    }

    prevYearBtn.addEventListener('click', () => {
        currentYear--;
        updateYearDisplay();
        generateCalendar(currentYear, currentMonth);
    });

    nextYearBtn.addEventListener('click', () => {
        currentYear++;
        updateYearDisplay();
        generateCalendar(currentYear, currentMonth);
    });

    function loadServices() {
        const services = [
            { date: '2023-06-20', type: 'Delivery' },
            { date: '2023-06-21', type: 'Pick-up' },
            { date: '2023-06-22', type: 'Rush' }
        ];

        services.forEach(service => {
            const serviceItem = document.createElement('li');
            serviceItem.textContent = `${service.date}: ${service.type}`;
            servicesElement.appendChild(serviceItem);
        });
    }

    updateYearDisplay();
    generateMonths();
    generateCalendar(currentYear, currentMonth);
    loadServices();
}); 

/* HIDE KO MUNA 6/22/24 23:06 last edit ko nakakabaliw po 
document.addEventListener('DOMContentLoaded', () => {
    const yearElement = document.getElementById('year');
    const prevYearBtn = document.getElementById('prevYear');
    const nextYearBtn = document.getElementById('nextYear');
    const monthsElement = document.getElementById('months');
    const calendarElement = document.getElementById('calendar');
    const servicesElement = document.getElementById('services');

    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth();

    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    function generateMonths() {
        monthsElement.innerHTML = '';
        months.forEach((month, index) => {
            const monthElement = document.createElement('div');
            monthElement.className = 'month';
            monthElement.textContent = month;
            monthElement.addEventListener('click', () => {
                generateCalendar(currentYear, index);
            });
            monthsElement.appendChild(monthElement);
        });
    }

    function generateCalendar(year, month) {
        calendarElement.innerHTML = '';

        const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        daysOfWeek.forEach(day => {
            const dayElement = document.createElement('div');
            dayElement.className = 'day';
            dayElement.textContent = day;
            calendarElement.appendChild(dayElement);
        });

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement('div');
            emptyCell.className = 'empty';
            calendarElement.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dateCell = document.createElement('div');
            dateCell.className = 'date';
            dateCell.textContent = day;
            calendarElement.appendChild(dateCell);
        }
    }

    function updateYearDisplay() {
        yearElement.textContent = currentYear;
    }

    prevYearBtn.addEventListener('click', () => {
        currentYear--;
        updateYearDisplay();
        generateCalendar(currentYear, currentMonth);
    });

    nextYearBtn.addEventListener('click', () => {
        currentYear++;
        updateYearDisplay();
        generateCalendar(currentYear, currentMonth);
    });

    function loadServices() {
        const services = [
            { date: '2023-06-20', type: 'Delivery' },
            { date: '2023-06-21', type: 'Pick-up' },
            { date: '2023-06-22', type: 'Rush' }
        ];

        services.forEach(service => {
            const serviceItem = document.createElement('li');
            serviceItem.textContent = `${service.date}: ${service.type}`;
            servicesElement.appendChild(serviceItem);
        });
    }

    updateYearDisplay();
    generateMonths();
    generateCalendar(currentYear, currentMonth);
    loadServices();
}); */