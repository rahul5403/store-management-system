// Get all the list items and add a "close" button to each one
//localStorage.clear()
let myNodelist = document.getElementsByTagName("LI");
for (let i = 0; i < myNodelist.length; i++) {
    let span = document.createElement("SPAN");
    let txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    myNodelist[i].appendChild(span);
}

// Get the saved list items from local storage
let ulContent = localStorage.getItem("ulContent");
if(ulContent) {
    // Split the items by line breaks to get an array
    let items = ulContent.split("\n");
    // Loop through the items and add each one to the list
    for (let i = 0; i < items.length; i++) {
        if (items[i] === '') continue;
        if(items[i] === "\u00D7")continue;
        let li = document.createElement("li");
        li.innerText = items[i];
        document.getElementById("myUL").appendChild(li);
        let span = document.createElement("SPAN");
        let txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);
    }
}

// Click on a close button to hide the current list item
let close = document.getElementsByClassName("close");
for (let i = 0; i < close.length; i++) {
    close[i].onclick = function () {
        let div = this.parentElement;
        div.style.display = "none";
        // Remove the item from local storage
        let ulEl = document.getElementById("myUL");
        let ulContent = ulEl.innerText;
        localStorage.setItem("ulContent", ulContent);
    }
}

// Add a "checked" symbol when clicking on a list item
let list = document.querySelector('ul');
list.addEventListener('click', function (ev) {
    if (ev.target.tagName === 'LI') {
        ev.target.classList.toggle('checked');
    }
}, false);

// Create a new list item when clicking on the "Add" button
let addBtn = document.getElementById('addBtn');
addBtn.addEventListener('click', function() {
    let li = document.createElement("li");
    let inputValue = document.getElementById("myInput").value;
    let t = document.createTextNode(inputValue);
    li.appendChild(t);
    if (inputValue === '') {
        alert("You must write something!");
    } else {
        document.getElementById("myUL").appendChild(li);
    }
    document.getElementById("myInput").value = "";
    let span = document.createElement("SPAN");
    let txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);
    // Add "close" button functionality for newly added list item
    for (let i = 0; i < close.length; i++) {
        close[i].onclick = function() {
            let div = this.parentElement;
            div.style.display = "none";

        // Remove the element from local storage
        let ulEl = document.getElementById("myUL");
        let ulContent = ulEl.innerText.replace("\u00D7", "");
        localStorage.setItem("ulContent", ulContent);
    }
    }

    // Store the updated content of the list in local storage
    let ulEl = document.getElementById("myUL");
    let ulContent = ulEl.innerText;
    localStorage.setItem("ulContent", ulContent);
});