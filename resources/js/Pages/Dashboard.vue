<template>
    <div>
        <layout>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <div class="general-statistics">
                            <div class="general-statistics__header">
                                <h3>Current Period</h3>
                                  <select name="periods" id="period" v-model="period" @change="changePeriod()">
                                    <option name="period" value="month">This Month</option>
                                    <option name="period" value="year">This Year</option>
                                </select>
                            </div>
                            <div class="general-statistics__body">
                                <div class="block">
                                    <span class="block-title">Total Players:</span>
                                    <span class="block-number">{{this.totalPlayers}}</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Deposits Today</span>
                                    <span class="block-number">{{this.deposits}}</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Registrations</span>
                                    <span class="block-number">{{this.registrations}}</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Net Revenue</span>
                                    <span class="block-number">{{this.netRevenue}}</span>
                                </div>
                                <div class="block">
                                    <span class="block-title">Playeurs online</span>
                                    <span class="block-number">{{this.playersOnline}}</span>
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
        border-radius: 10px;
        border: 1px solid #eaeaea;
        padding: 15px;
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

    h3 {
        font-weight: bold;
        text-transform: uppercase;
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

            this.init();

        },
        data() {

            return {
                chartPayments: [],
                chartRegistration: [],
                chartMoneySpent: [],
                totalPlayers: 0,
                deposits: 0,
                registrations: 0,
                netRevenue: 0,
                playersOnline: 0,
                loading: true,
                period: 'month',
            };
        },
        methods: {
                init(period = 'month') {
                    (async () => {
                        this.chartPayments = await this.getChartPayments(period);
                        this.chartRegistration = await this.getChartRegistration(period);
                        this.chartMoneySpent = await this.getChartMoneySpent(period);
                        const chartPayments = new Chart(document.getElementById('chart-payments') , {
                            type: 'line',
                            responsive: true,
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                                datasets: [
                                {
                                    label: '2018 Sales',
                                    data: await this.getChartPayments(period),
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
                                    data: await this.getChartRegistration(period),
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
                                    data: await this.getChartMoneySpent(period),
                                    backgroundColor: '#00ff6645',
                                }
                                ]
                            }
                        });

                        this.totalPlayers = await this.getTotalPlayers(period);
                        this.deposits = await this.getDeposits(period);
                        this.registrations = await this.getRegistrations(period);
                        this.netRevenue = await this.getNetRevenue(period);
                        this.playersOnline = await this.getPlayersOnline(period);
                        this.loading = false;
                    })();
                },
                changePeriod() {
                   this.init(this.period);
                },
                async getChartPayments(period) {
                    if (period === 'month') {
                        return [300, 700, 450, 750, 450];
                    } else {
                        return [30, 70, 45, 75, 45];
                    }
                },

                async getChartRegistration(period) {
                     if (period === 'month') {
                        return [300, 700, 450, 750, 450];
                    } else {
                        return [30, 70, 45, 75, 45];
                    }
                },

                async getChartMoneySpent(period) {
                     if (period === 'month') {
                        return [300, 700, 450, 750, 450];
                    } else {
                        return [30, 70, 45, 75, 45];
                    }
                },

                async getTotalPlayers(period) {
                    if (period === 'month') {
                        return 12321;
                    } else {
                        return 123;
                    }
                },

                async getDeposits(period) {
                     if (period === 'month') {
                        return 321321321321;
                    } else {
                        return 32132132;
                    }
                },

                async getRegistrations(period) {
                    if (period === 'month') {
                        return 23123;
                    } else {
                        return 233;
                    }
                },

                async getNetRevenue(period) {
                    if (period === 'month') {
                        return 2321321321;
                    } else {
                        return 23213;
                    }
                },

                async getPlayersOnline(period) {
                     if (period === 'month') {
                        return 321321321;
                    } else {
                        return 3213;
                    }
                }
            }
    }
</script>
