function slideToggle(t, e, o) { 0 === t.clientHeight ? j(t, e, o, !0) : j(t, e, o) } function slideUp(t, e, o) { j(t, e, o) } function slideDown(t, e, o) { j(t, e, o, !0) } function j(t, e, o, i) { void 0 === e && (e = 400), void 0 === i && (i = !1), t.style.overflow = "hidden", i && (t.style.display = "block"); var p, l = window.getComputedStyle(t), n = parseFloat(l.getPropertyValue("height")), a = parseFloat(l.getPropertyValue("padding-top")), s = parseFloat(l.getPropertyValue("padding-bottom")), r = parseFloat(l.getPropertyValue("margin-top")), d = parseFloat(l.getPropertyValue("margin-bottom")), g = n / e, y = a / e, m = s / e, u = r / e, h = d / e; window.requestAnimationFrame(function l(x) { void 0 === p && (p = x); var f = x - p; i ? (t.style.height = g * f + "px", t.style.paddingTop = y * f + "px", t.style.paddingBottom = m * f + "px", t.style.marginTop = u * f + "px", t.style.marginBottom = h * f + "px") : (t.style.height = n - g * f + "px", t.style.paddingTop = a - y * f + "px", t.style.paddingBottom = s - m * f + "px", t.style.marginTop = r - u * f + "px", t.style.marginBottom = d - h * f + "px"), f >= e ? (t.style.height = "", t.style.paddingTop = "", t.style.paddingBottom = "", t.style.marginTop = "", t.style.marginBottom = "", t.style.overflow = "", i || (t.style.display = "none"), "function" == typeof o && o()) : window.requestAnimationFrame(l) }) }

let sidebarItems = document.querySelectorAll('.sidebar-item.has-sub');
for (var i = 0; i < sidebarItems.length; i++) {
    let sidebarItem = sidebarItems[i];
    sidebarItems[i].querySelector('.sidebar-link').addEventListener('click', function (e) {
        e.preventDefault();

        let submenu = sidebarItem.querySelector('.submenu');
        if (submenu.style.display == 'none') submenu.classList.add('active')
        else submenu.classList.remove('active')
        slideToggle(submenu, 300)
    })
}

window.addEventListener('DOMContentLoaded', (event) => {
    var w = window.innerWidth;
    if (w < 1200) {
        document.getElementById('sidebar').classList.remove('active');
    }
});
window.addEventListener('resize', (event) => {
    var w = window.innerWidth;
    if (w < 1200) {
        document.getElementById('sidebar').classList.remove('active');
    } else {
        document.getElementById('sidebar').classList.add('active');
    }
});

document.querySelector('.burger-btn').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');
    document.querySelector('.burger-btn').classList.add('d-xl-none');
    document.querySelector('#nav-tittle').classList.add('d-xl-none');
    document.querySelector('.header').classList.add('py-4');
})
document.querySelector('.sidebar-hide').addEventListener('click', () => {
    document.getElementById('sidebar').classList.toggle('active');
    document.querySelector('.burger-btn').classList.remove('d-xl-none');
    document.querySelector('#nav-tittle').classList.remove('d-xl-none');
    document.querySelector('.header').classList.remove('py-4');
});

// append
$(document).ready(function () {
    var max_fields = 5; 
    var wrapper = $("#append-area"); 
    var add_button = $(".add_field_button"); 

    var x = 1; 
    $(add_button).click(function (e) { 
        e.preventDefault();
            $(wrapper).append($('#append-item').html());
             //add input box
    }); 

    
    $(wrapper).on("click", ".bi-x-circle-fill", function (e) { //user click on remove text
        $(this).parent('div').remove();
    })
});




// Perfect Scrollbar Init
if (typeof PerfectScrollbar == 'function') {
    const container = document.querySelector(".sidebar-wrapper");
    const ps = new PerfectScrollbar(container, {
        wheelPropagation: false
    });
}

// event listener reset filter sewazoom
$('body').on('click','#btn-reset-zoom', function () {
    $('#filter-nama-zoom').val('')
    $('#filter-tanggal-zoom').val('')
    $('#filter-departemen-zoom').val('')
    $('#filter-status-zoom').prop('selectedIndex',0)
});

// event listener reset filter revisidata
$('body').on('click','#btn-reset-rev', function () {
    $('#filter-namadata-rev').val('')
    $('#filter-tanggal-rev').val('')
    $('#filter-status-rev').prop('selectedIndex',0)
    $('#filter-jenisrevisi-rev').prop('selectedIndex',0)
})

// event listener reset filter akses internet
$('body').on('click','#btn-reset-internet', function () {
    $('#filter-nama-internet').val('')
    $('#filter-departemen-internet').val('')
    $('#filter-status-internet').prop('selectedIndex',0)
})
// event listener reset filter peminjaman inven
$('body').on('click','#btn-reset-inventaris', function () {
    $('#filter-nama-inventaris').val('')
    $('#filter-tanggal-inventaris').val('')
    $('#filter-status-inventaris').prop('selectedIndex',0)
    $('#filter-departemen-inventaris').val('')
})
$('body').on('click','#btn-reset-aksprog', function () {
    $('#filter-nama-aksprog').val('')
    $('#filter-status-aksprog').prop('selectedIndex',0)
    $('#filter-departemen-aksprog').val('')
});

$('#tnc').on('click',function() {
    $('#snk').slideDown(300,'linear');
    $('#snk').removeClass('d-none');
});
$('#hide').on('click',function() {
    $(this).parent('p').slideUp(200,'linear')
});
