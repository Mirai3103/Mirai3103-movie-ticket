    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script>
    <script src="/public/js/validation.js">

    </script>
    <?php


    global $scripts;
    foreach ($scripts as $script) {
        echo "<script src='{$script}'></script>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="
https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js
"></script>

    <script>
import alpinejs from 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/+esm'

window.Alpine = alpinejs
window.addEventListener('DOMContentLoaded', () => {
    alpinejs.start()
})
    </script>

    <!-- from cdn -->


    <script type="module">
import queryString from 'https://cdn.jsdelivr.net/npm/query-string@9.0.0/+esm'
window.queryString = queryString
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>