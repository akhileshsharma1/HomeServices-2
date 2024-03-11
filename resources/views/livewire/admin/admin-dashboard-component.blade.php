<div>
    <style>
        main{
    margin-top: 85px;
    padding: 2rem 1.5rem;
    background-image: linear-gradient(to right, #4CAF50, #a6f4cc);
        min-height: calc(100vh - 90px)
}

.cards{
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2rem;
    margin-top: 1rem;
}

.card-single{
    display: flex;
    justify-content: space-between;
    background: #fff;
    padding: 2rem;
    border-radius: 2px;
}

.card-single h1{
    color:black;
}

.card-single div:last-child span{
    font-size: 3rem;
    color: var(--main-color);
}

.card-single div:first-child span{
    color: var(--text-grey);
}

.card-single:last-child{
    background: var(--main-color);
}

.card-single:last-child h1,
.card-single:last-child div:first-child span,
.card-single:last-child div:last-child span{
    color: #fff;
}
    </style>
<main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>{{ $customerCount }}</h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>{{ $providerCount }}</h1>
                        <span>Service Providers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>{{ $serviceCount }}</h1>
                        <span>Services</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
            </div>
        </main>
</div>