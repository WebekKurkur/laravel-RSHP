<!DOCTYPE html>
<html lang="en">

@include('layouts.lte.header')

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    <div class="app-wrapper">
        @include('layouts.lte.navbar')
        @include('layouts.lte.sidebar')
        
        <main class="app-main">
            @yield('content')
        </main>

        @include('layouts.lte.footer')
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!-- AdminLTE handles treeview toggles via data-lte-toggle on the parent anchors -->
    <script
      src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
      crossorigin="anonymous"
    ></script>
    <script>
      // Robust sidebar active-link detection (keeps parent treeview open for index/children pages)
      document.addEventListener('DOMContentLoaded', function () {
        try {
          const currentPath = location.pathname.replace(/\/$/, '') || '/';
          const links = Array.from(document.querySelectorAll('.sidebar-wrapper .nav-link'));

          // Normalize path helper
          const normalize = (path) => {
            if (!path) return null;
            try {
              const a = document.createElement('a');
              a.href = path;
              return (a.pathname || '').replace(/\/$/, '') || '/';
            } catch (e) {
              return null;
            }
          };

          // Clear previous active states
          links.forEach(l => l.classList.remove('active'));

          // Find best match by exact pathname, then by startsWith
          let matched = null;
          for (const link of links) {
            const href = link.getAttribute('href');
            if (!href || href === '#' || href.startsWith('javascript')) continue;
            const linkPath = normalize(href);
            if (!linkPath) continue;
            if (linkPath === currentPath) { matched = link; break; }
            // If currentPath is a subpath of linkPath (or vice versa), consider it
            if (currentPath.startsWith(linkPath + '/') || linkPath.startsWith(currentPath + '/')) {
              // choose the longer (more specific) match
              if (!matched) matched = link;
              else {
                const existingLen = normalize(matched.getAttribute('href'))?.length || 0;
                if ((linkPath.length || 0) > existingLen) matched = link;
              }
            }
          }

          if (matched) {
            matched.classList.add('active');
            // open parent treeviews
            let tree = matched.closest('.nav-treeview');
            while (tree) {
              const parentItem = tree.closest('.nav-item');
              if (!parentItem) break;
              parentItem.classList.add('menu-open');
              const parentLink = parentItem.querySelector(':scope > a.nav-link');
              if (parentLink) {
                parentLink.classList.add('active');
                parentLink.setAttribute('aria-expanded', 'true');
              }
              tree = parentItem.closest('.nav-treeview');
            }
            // ensure visibility
            matched.scrollIntoView({ block: 'nearest' });
          }
        } catch (err) {
          console.warn('sidebar active detection error', err);
        }
      });
    </script>
    @stack('scripts')
</body>