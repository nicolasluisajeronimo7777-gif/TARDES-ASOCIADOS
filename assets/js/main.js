document.addEventListener('DOMContentLoaded', function(){
  // fade-in main
  const main = document.querySelector('main');
  if(main){ main.style.opacity=0; setTimeout(()=>{ main.style.transition='opacity .6s'; main.style.opacity=1; },50); }

  // tooltip init
  const tt = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tt.forEach(el=> new bootstrap.Tooltip(el));

  // ripple effect for buttons with class ripple
  document.querySelectorAll('.ripple').forEach(btn => {
    btn.addEventListener('click', function(e){
      const el = this;
      el.classList.remove('active');
      void el.offsetWidth;
      el.classList.add('active');
      setTimeout(()=> el.classList.remove('active'), 500);
    });
  });

  // show welcome modal on first load (once per session)
  if(!sessionStorage.getItem('visited')){
    const modal = new bootstrap.Modal(document.getElementById('welcomeModal'));
    modal.show();
    sessionStorage.setItem('visited','1');
  }

  // subtle floating animation for icons
  const floats = document.querySelectorAll('.float-icon');
  floats.forEach((el,i) => {
    el.animate([{ transform: 'translateY(0px)' },{ transform:'translateY(-6px)' },{ transform:'translateY(0px)'}], { duration: 3000 + (i*200), iterations: Infinity });
  });
});

// Chart.js sample
(function(){
  const ctx = document.getElementById('chartCanvas');
  if(!ctx) return;
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Mar','Abr','May','Jun','Jul','Ago'],
      datasets: [{
        label: 'Llegadas tarde',
        data: [12,9,14,10,18,15],
        tension: 0.4,
        borderWidth: 2,
        pointRadius: 3,
        borderColor: 'rgba(37,99,235,0.9)',
        backgroundColor: 'rgba(6,182,212,0.08)'
      }]
    },
    options: { responsive:true, plugins:{ legend:{ display:false } }, scales:{ y:{ beginAtZero:true, ticks:{ stepSize:5 } } } }
  });
})();
