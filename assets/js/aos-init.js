// JavaScript
document.addEventListener('DOMContentLoaded', function () {
    // Get all staff items
    const staffItems = document.querySelectorAll('.staff');

    // Function to add data-aos-delay based on index
    function addAosDelayToStaff() {
        staffItems.forEach((item, index) => {
            item.setAttribute('data-aos', 'zoom-in-up');
            item.setAttribute('data-aos-delay', index * 200); // Adjust the delay as needed
            item.setAttribute('data-aos-anchor', '.loop-layout-bridgestaff'); // Adjust the delay as needed
        });
    }

    // Call the function to add data-aos-delay to grid items
    addAosDelayToStaff();

    // Get all grid items
    const gridItems = document.querySelectorAll(
        '.gb-grid-wrapper .gb-grid-column > .gb-container'
    );

    // Function to add data-aos-delay based on index
    function addAosDelayToGrid() {
        gridItems.forEach((item, index) => {
            // check if there's already a data-aos attribute, and bail if so
            if (item.hasAttribute('data-aos')) {
                console.log(item);
                return;
            }

            // get other classes of the parent .gb-grid-column
            const classes = item.parentElement.classList;

            // get the classes in a format of .class1.class2.class3
            const classesString = '.' + classes.value.replace(/\s+/g, '.');

            item.setAttribute('data-aos-anchor', classesString);
            item.setAttribute('data-aos', 'zoom-in-up');
            item.setAttribute('data-aos-delay', index * 200); // Adjust the delay as needed
        });
    }

    // Call the function to add data-aos-delay to grid items
    addAosDelayToGrid();

    AOS.init({
        offset: 0,
        duration: 1000,
    });
});
