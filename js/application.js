const selectElement = (element) => document.querySelector(element);

selectElement('.menu-icons').addEventListener('click', () => {
    selectElement('nav').classList.toggle('active');
});



// let hasChild = document.querySelector('.nav-list').querySelectorAll(".page_item_has_children");
// for (let i = 0; i < hasChild.length; i++) {
//     hasChild[i].innerHTML = hasChild[i].innerHTML.replace(/<a[^>]+>/g, '');
// };

// function stripHtml(html){
//     // Create a new div element
//     var temporalDivElement = document.createElement("div");
//     // Set the HTML content with the providen
//     temporalDivElement.innerHTML = html;
//     // Retrieve the text property of the element (cross-browser support)
//     return temporalDivElement.textContent || temporalDivElement.innerText || "";
// }