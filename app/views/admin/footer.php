    </section>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/dayjs@1/dayjs.min.js"></script> -->
    <script src='/public/bundle/admin.bundle.js/admin.js'></script>

    <?php
    global $scripts;
    foreach ($scripts as $script) {
        echo "<script src='{$script}'></script>";
    }
    ?>

    </body>

    </html>