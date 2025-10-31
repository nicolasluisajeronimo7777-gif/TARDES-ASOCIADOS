<?php
// footer creative
?>
<style>
  .footer-creative{
  position: absolute;
  width: 100%;
  top: 122%;
  background-color: #0a0f1e;
  padding: 40px 0 20px;
}

.footer-creative a {
  text-decoration: none;
  color: #ccc;
  transition: color 0.3s ease;
}

.footer-creative a:hover {
  color: #fff;
}

.footer-creative .btn-ghost {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 10px;
  width: 40px;
  height: 40px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;
  box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.05);
}


.footer-creative .btn-ghost::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(145deg, rgba(255,255,255,0.12), transparent 70%);
  opacity: 0.3;
}


.footer-creative .btn-ghost i {
  color: #ffffff;
  font-size: 18px;
  transition: all 0.3s ease;
}

.footer-creative .btn-ghost:hover {
  transform: translateY(-3px);
  box-shadow: 0 0 15px rgba(255,255,255,0.2), inset 0 0 10px rgba(255,255,255,0.2);
}

.footer-creative .btn-ghost:hover i {
  text-shadow: 0 0 8px #fff, 0 0 15px #fff;
}

.footer-creative hr {
  border-color: rgba(255,255,255,0.08);
}
</style>

<footer class="footer-creative">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <h5 class="text-white">TARDES&ASOCIADOS</h5>
        <p class="small">Gestión optimizada con interfaz moderna y animada.</p>
      </div>
      <div class="col-md-3">
      </div>
      <div class="col-md-3 text-end">
        <h6 class="text-white">Contacto</h6>
        <p class="small mb-1">soporte@tardes&asociados.local</p>
        <div class="d-flex justify-content-end gap-2">
          <a class="btn btn-sm btn-ghost" href="#"><i class="bi bi-facebook"></i></a>
          <a class="btn btn-sm btn-ghost" href="#"><i class="bi bi-twitter"></i></a>
          <a class="btn btn-sm btn-ghost" href="#"><i class="bi bi-envelope"></i></a>
        </div>
      </div>
    </div>
    <hr />
    <div class="text-center small text-white-50">© 2025 TARDES&ASOCIADOS</div>
  </div>
</footer>
