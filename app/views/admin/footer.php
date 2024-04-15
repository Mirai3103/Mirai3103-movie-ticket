    </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

    <script type='module'>
import alpinejs from 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/+esm'

window.Alpine = alpinejs
alpinejs.data('dataTable', ({
    initialQuery = {},
    endpoint,
}) => ({
    data: [],
    selected: null,
    isFetching: false,
    query: initialQuery,
    totalItems: 0,
    init() {
        this.refresh();
        this.$watch('query', async (value) => {
            this.refresh();
            const queryStr = queryString.stringify(value);
            // set window history
            window.history.pushState({}, '', window.location.pathname + '?' + queryStr);
        }, {
            deep: true
        });
    },
    createOrderFn: function(orderBy) {
        if (this.query['sap-xep'] === orderBy) {
            this.query['thu-tu'] = this.query['thu-tu'] === 'ASC' ? 'DESC' : 'ASC';
        } else {
            this.query['thu-tu'] = 'ASC';
            this.query['sap-xep'] = orderBy;
        }
    },
    refresh: function() {
        this.data = [];
        this.isFetching = true;
        const url = `${endpoint}?${queryString.stringify(this.query)}`;
        const queryRs = axios.get(url).then(response => {
            this.data = response.data.data;
            this.totalItems = response.headers['x-total-count'];
        }).finally(() => {
            this.isFetching = false;
        });
    },
}))
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
    </body>

    </html>