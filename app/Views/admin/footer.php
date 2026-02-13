<!-- FOOTER (shared) -->
<footer class="mt-4 pt-3 border-top text-center text-muted">
  <small>
    <i class="fa fa-shield"></i> DTI Aurora Price Monitoring System v2.1 • 
    For official use only • 
    <i class="fa fa-phone"></i> Contact: (042) 123-4567
  </small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  (function(){
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');
    
    if (sidebarToggle) {
      if (document.body.classList.contains('sidebar-hidden')) sidebarToggle.classList.add('active');

      sidebarToggle.addEventListener('click', () => {
        document.body.classList.toggle('sidebar-hidden');
        const isHidden = document.body.classList.contains('sidebar-hidden');
        sidebarToggle.classList.toggle('active', isHidden);
        sidebarToggle.setAttribute('aria-label', isHidden ? 'Show navigation menu' : 'Hide navigation menu');
        sidebarToggle.setAttribute('aria-expanded', String(!isHidden));
      });
    }

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && document.body.classList.contains('sidebar-hidden')) {
        document.body.classList.remove('sidebar-hidden');
      }
    });

    document.addEventListener('click', (e) => {
      if (window.innerWidth <= 768 && sidebar && sidebarToggle && !sidebar.contains(e.target) && !sidebarToggle.contains(e.target) && !document.body.classList.contains('sidebar-hidden')) {
        document.body.classList.add('sidebar-hidden');
      }
    });

    // small loading pulse on stat values (keeps dashboard behavior)
    setTimeout(() => {
      document.querySelectorAll('.stat-value').forEach(el => {
        el.classList.add('loading');
        setTimeout(() => el.classList.remove('loading'), 1500);
      });
    }, 1000);
  })();
</script>
</body>
</html>
