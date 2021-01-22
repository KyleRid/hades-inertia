<template>
    <div>
        <layout>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="general-statistics">
                            <div class="general-statistics__header">
                                <h3>Essentials</h3>
                                <select>
                                    <option>This Month</option>
                                </select>
                            </div>
                            <div class="general-statistics__body">
                                <div class="block">
                                    <span class="block-title">Total Players:</span>
                                    <span class="block-number">45</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Deposits Today</span>
                                    <span class="block-number">156516</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Registrations</span>
                                    <span class="block-number">2312</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Net Revenue</span>
                                    <span class="block-number">3213</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Playours online</span>
                                    <span class="block-number">3213</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="charts">
                            <div>Current Users Online: 245</div>
                            <section id="trading-table">
                                <span></span>
                                <!--<trading-vue :data="this.$data"></trading-vue> -->
                            </section>

                            <div>Payments</div>
                            <section style="width: 500px; height: 500px">
                                <canvas id="chart-payments" style="width: 100px; height: 100px;"></canvas>
                            </section>

                            <div>Registration</div>
                            <section style="width: 500px; height: 500px">
                                <canvas id="chart-registrations" style="width: 100px; height: 100px;"></canvas>
                            </section>

                            <div>Money spent per month</div>
                            <section style="width: 500px; height: 500px">
                                <canvas id="chart-money-spent" style="width: 100px; height: 100px;"></canvas>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </layout>
    </div>
</template>

<style lang="scss">
.general-statistics {

    &__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    &__body {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .block {
        display: flex;
        flex-direction: column;
        border-radius: 10px;
        border: 1px solid #eaeaea;
        padding: 15px;
    }

    .block-title {
        font-weight: bold;
        font-size: 22px;
    }

    .block-number {
        font-size: 45px;
    }
}
</style>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import Sidebar from '@/Shared/Sidebar'
    import Layout from '@/Shared/Layout'
    import Chart from 'chart.js';
    export default {
        name: 'app',
        components: {
            AppLayout,
            Welcome,
            Sidebar,
            Layout
        },
        mounted() {

            (async () => {
                this.chartPayments = await this.getChartPayments();
                this.chartRegistration = await this.getChartRegistration();
                this.chartMoneySpent = await this.getchartMoneySpent();
                const chartPayments = new Chart(document.getElementById('chart-payments') , {
                    type: 'line',
                    responsive: true,
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                        datasets: [
                        {
                            label: '2018 Sales',
                            data: await this.getChartPayments(),
                            backgroundColor: '#00ff6645',
                        }
                        ]
                    }
                });

                const chartRegistration = new Chart(document.getElementById('chart-registrations') , {
                    type: 'line',
                    responsive: true,
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                        datasets: [
                        {
                            label: '2018 Sales',
                            data: await this.getChartRegistration(),
                            backgroundColor: '#00ff6645',
                        }
                        ]
                    }
                });

                console.log(this.chartMoneySpent);
                const chartMoneySpent = new Chart(document.getElementById('chart-money-spent') , {
                    type: 'line',
                    responsive: true,
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                        datasets: [
                        {
                            label: '2018 Sales',
                            data: await this.getchartMoneySpent(),
                            backgroundColor: '#00ff6645',
                        }
                        ]
                    }
                });
            })();

        },
        data() {

            return {
                chartPayments: [],
                chartRegistration: [],
                chartMoneySpent: [],
            //    ohlcv: [
            //             [ 1551128400000, 33,  37.1, 14,  14,  196 ],
            //             [ 1551132000000, 13.7, 30, 6.6,  30,  206 ],
            //             [ 1551135600000, 29.9, 33, 21.3, 21.8, 74 ],
            //             [ 1551139200000, 21.7, 25.9, 18, 24,  140 ],
            //             [ 1551142800000, 24.1, 24.1, 24, 24.1, 29 ],
            //         ]
            };
        },
        methods: {
            async getChartPayments() {
                return [300, 700, 450, 750, 450];
            },
            async getChartRegistration() {
                return [300, 700, 450, 750, 450];
            },
                async getchartMoneySpent() {
                return [300, 700, 450, 750, 450];
            }
            }
    }
</script>
