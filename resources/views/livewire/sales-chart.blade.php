<div>
    <!-- فیلترهای انتخاب -->
    <div>
        <label>انتخاب سال:</label>
        <select wire:model="year">
            <option value="2023">2023</option>
            <option value="2024">2024</option>
        </select>

        <label>انتخاب دسته‌بندی:</label>
        <select wire:model="category">
            <option value="all">همه</option>
            <option value="electronics">الکترونیکی</option>
            <option value="clothing">پوشاک</option>
        </select>
    </div>

    <!-- نمودار -->
    <div id="salesChart" style="width: 100%; height: 400px;"></div>
    <button onclick="window.dispatchEvent(new CustomEvent('chartUpdated', { detail: { salesData: [10, 20, 30, 40, 50, 60] } }))">تست نمودار</button>
    <div id="salesChart"></div>
</div>


<script>
    console.log('test1');
    window.addEventListener('chartUpdated', event => {
        const salesData = event.detail.salesData;
        console.log('test3', salesData);
        Highcharts.chart('salesChart', {
            chart: { type: 'column' },
            title: { text: 'آمار فروش ماهانه' },
            xAxis: { categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'] },
            yAxis: { title: { text: 'میزان فروش' } },
            series: [{ name: 'فروش', data: salesData }]
        });
    });
</script>
