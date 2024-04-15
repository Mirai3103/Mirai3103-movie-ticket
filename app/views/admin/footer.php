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
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

    <script type='module'>
import alpinejs from 'https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/+esm'
alpinejs.plugin(focus)

window.Alpine = alpinejs
alpinejs.data('dataTable', ({
    initialQuery = {},
    endpoint,
}) => ({
    data: [],
    selected: null,
    isFetching: false,
    query: {
        'trang': 1,
        'limit': 10,
        ...initialQuery,
    },
    totalItems: 0,
    init() {
        this.refresh();
    },
    getArrayPages() {

        console.log(this.totalItems, this.query['limit']);
        const totalPage = Math.ceil(this.totalItems / this.query['limit']);
        if (totalPage >= 8) {
            const begin = Math.max(1, this.query['trang'] - 2);
            const end = Math.min(totalPage, this.query['trang'] + 2);
            return Array.from({
                length: end - begin + 1
            }, (_, i) => i + begin);
        }
        return Array.from({
            length: totalPage
        }, (_, i) => i + 1);
    },
    createOrderFn: function(orderBy) {
        if (this.query['sap-xep'] === orderBy) {
            this.query['thu-tu'] = this.query['thu-tu'] === 'ASC' ? 'DESC' : 'ASC';
        } else {
            this.query['thu-tu'] = 'ASC';
            this.query['sap-xep'] = orderBy;
        }
        this.refresh();
    },
    refresh: function() {
        this.data = [];
        this.isFetching = true;
        const queryStr = queryString.stringify(this.query, {
            arrayFormat: 'bracket'
        });
        const url = `${endpoint}?${queryStr}`;

        const queryRs = axios.get(url).then(response => {
            this.data = response.data.data;
            this.totalItems = response.headers['x-total-count'];

            window.history.pushState({}, '', window.location.pathname + '?' + queryStr);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    </body>

    </html>