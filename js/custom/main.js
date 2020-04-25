/* On window load */
window.onload = function() {
    Particles.init({
        selector: '#particles-background',
        color: '#eee',
        maxParticles: 150,
        speed: 0.25,
        sizeVariations: 5,
    });

    var controller = new ScrollMagic.Controller();

    new ScrollMagic.Scene({
        triggerElement: ".skill-microcontroller",
        triggerHook: 0.7,
    })
        .setClassToggle(".skill-microcontroller", "visible")
        .addTo(controller);

    new ScrollMagic.Scene({
        triggerElement: ".skill-software",
        triggerHook: 0.7,
    })
        .setClassToggle(".skill-software", "visible")
        .addTo(controller);

    new ScrollMagic.Scene({
        triggerElement: ".skill-networking",
        triggerHook: 0.7,
    })
        .setClassToggle(".skill-networking", "visible")
        .addTo(controller);


    new ScrollMagic.Scene({
        triggerElement: "#service-consulting",
        triggerHook: 0.9,
    })
        .setClassToggle("#service-consulting", "visible")
        .addTo(controller);


    new ScrollMagic.Scene({
        triggerElement: "#service-development",
        triggerHook: 0.9,
    })
        .setClassToggle("#service-development", "visible")
        .addTo(controller);

    new ScrollMagic.Scene({
        triggerElement: "#service-warranty",
        triggerHook: 0.9,
    })
        .setClassToggle("#service-warranty", "visible")
        .addTo(controller);

    new ScrollMagic.Scene({
        triggerElement: "#service-deployment",
        triggerHook: 0.9,
    })
        .setClassToggle("#service-deployment", "visible")
        .addTo(controller);

    $('#contact input').change(function (e) {
        if (e.target.value === "") {
            e.target.style.borderColor = "white";
        } else {
            e.target.style.borderColor = "#00a8cc";
        }
    });

    $('#contact textarea').change(function (e) {
        if (e.target.value === "") {
            e.target.style.borderColor = "white";
        } else {
            e.target.style.borderColor = "#00a8cc";
        }
    });
};
