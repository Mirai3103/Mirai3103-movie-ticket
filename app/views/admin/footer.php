    </section>
    </div>

    <script src='/public/bundle/admin.js'></script>

    <?php
    global $scripts;
    foreach ($scripts as $script) {
        echo "<script src='{$script}'></script>";
    }
    ?>

    </body>

    </html>