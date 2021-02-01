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

                this.totalPlayers = await this.getTotalPlayers();
                this.deposits = await this.getDeposits();
                this.registrations = await this.getRegistrations();
                this.netRevenue = await this.getNetRevenue();
                this.playersOnline = await this.getPlayersOnline();
                this.loading = false;
            })();

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
            };
        },
        methods: {
                async getChartPayments(period) {
                    return [300, 700, 450, 750, 450];
                },

                async getChartRegistration(period) {
                    return [300, 700, 450, 750, 450];
                },

                async getChartMoneySpent(period) {
                    return [300, 700, 450, 750, 450];
                },

                async getTotalPlayers(period) {
                    return 12321;
                },

                async getDeposits(period) {
                    return 321321321321;
                },

                async getRegistrations(period) {
                    return 23123;
                },

                async getNetRevenue(period) {
                    return 2321321321;
                },

                async getPlayersOnline(period) {
                    return 321321321;
                }
            }
    }
</script>
