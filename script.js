function searchDoctor() {

    let searchText =
        document.getElementById("searchInput").value.trim();

    if (searchText === "") {
        alert("Please enter a symptom, condition, or doctor name.");
        return;
    }

    alert("Searching for: " + searchText);

    console.log("Search:", searchText);
}

const dropdown = document.querySelector(".dropdown");
const dropdownMenu = document.querySelector(".dropdown-menu");

if(dropdown){

    dropdown.addEventListener("click", function(e){

        e.preventDefault();

        dropdownMenu.classList.toggle("show");
    });
}

document.addEventListener("click", function(event){

    if(
        dropdown &&
        !dropdown.contains(event.target)
    ){
        dropdownMenu.classList.remove("show");
    }
});

window.addEventListener("scroll", function(){

    const navbar =
        document.querySelector(".navbar");

    if(window.scrollY > 50){

        navbar.style.background = "#ffffff";
        navbar.style.boxShadow =
            "0 4px 15px rgba(0,0,0,0.1)";
    }
    else{

        navbar.style.boxShadow = "none";
    }

});

const heroButtons =
    document.querySelectorAll(".hero-buttons button");

heroButtons.forEach(button => {

    button.addEventListener("click", function(){

        alert(this.innerText);

    });

});

const cards =
    document.querySelectorAll(".card");

cards.forEach(card => {

    card.addEventListener("click", function(){

        const title =
            this.querySelector("h3").innerText;

        alert("Opening " + title);

    });

});

cards.forEach(card => {

    card.addEventListener("mouseenter", function(){

        this.style.transform =
            "translateY(-10px)";

        this.style.transition =
            "0.3s";

    });

    card.addEventListener("mouseleave", function(){

        this.style.transform =
            "translateY(0px)";

    });

});

const steps =
    document.querySelectorAll(".step");

steps.forEach(step => {

    step.addEventListener("mouseenter", () => {

        step.style.background =
            "#f0fbff";

    });

    step.addEventListener("mouseleave", () => {

        step.style.background =
            "#ffffff";

    });

});

const features =
    document.querySelectorAll(".feature");

features.forEach(feature => {

    feature.addEventListener("mouseenter", () => {

        feature.style.transform =
            "scale(1.05)";

        feature.style.transition =
            "0.3s";
    });

    feature.addEventListener("mouseleave", () => {

        feature.style.transform =
            "scale(1)";
    });

});

const downloadBtn =
    document.querySelector(".mobile-app button");

if(downloadBtn){

    downloadBtn.addEventListener("click", () => {

        alert("App download starting...");

    });

}

document.querySelectorAll('a[href^="#"]')
.forEach(anchor => {

    anchor.addEventListener("click", function(e){

        e.preventDefault();

        const target =
            document.querySelector(
                this.getAttribute("href")
            );

        if(target){

            target.scrollIntoView({
                behavior: "smooth"
            });

        }

    });

});

const navLinks =
    document.querySelectorAll(".nav-links a");

navLinks.forEach(link => {

    link.addEventListener("click", function(){

        navLinks.forEach(item => {

            item.classList.remove("active");

        });

        this.classList.add("active");

    });

});

let darkMode = false;

const darkButton =
    document.createElement("button");

darkButton.innerText = "🌙";

darkButton.style.position = "fixed";
darkButton.style.right = "20px";
darkButton.style.bottom = "20px";
darkButton.style.padding = "15px";
darkButton.style.borderRadius = "50%";

document.body.appendChild(darkButton);

darkButton.addEventListener("click", () => {

    darkMode = !darkMode;

    if(darkMode){

        document.body.style.background =
            "#111";

        document.body.style.color =
            "#fff";

        darkButton.innerText = "☀️";
    }
    else{

        document.body.style.background =
            "#f7fbff";

        document.body.style.color =
            "#000";

        darkButton.innerText = "🌙";
    }

});

const appointmentBtn =
document.querySelectorAll("button");

appointmentBtn.forEach(btn => {

    if(
        btn.innerText.includes("Appointment")
    ){

        btn.addEventListener("click", () => {

            let patientName =
                prompt("Enter your name");

            if(patientName){

                alert(
                    "Appointment booked for "
                    + patientName
                );
            }

        });

    }

});

const form = document.querySelector("form");

const nameField =
document.querySelector('input[name="name"]');

const emailField =
document.querySelector('input[name="email"]');

const phoneField =
document.querySelector('input[name="phone"]');

const messageField =
document.querySelector('textarea[name="message"]');

form.addEventListener("submit", function(e){

    let valid = true;

    // Remove previous errors

    [nameField,emailField,phoneField,messageField]
    .forEach(field => {

        field.classList.remove("error");
        field.classList.remove("success");

    });

    // Name Validation

    if(nameField.value.trim() === ""){

        nameField.classList.add("error");
        valid = false;

    }else{

        nameField.classList.add("success");

    }

    // Email Validation

    const emailPattern =
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(
        !emailPattern.test(
            emailField.value.trim()
        )
    ){

        emailField.classList.add("error");
        valid = false;

    }else{

        emailField.classList.add("success");

    }

    // Message Validation

    if(messageField.value.trim() === ""){

        messageField.classList.add("error");
        valid = false;

    }else{

        messageField.classList.add("success");

    }

    if(!valid){

        e.preventDefault();

        alert(
            "Please fill all required fields correctly."
        );

    }

});