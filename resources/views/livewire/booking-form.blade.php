<div>
<style>
    .booking-container {
            max-width: 400px;
            margin: 150px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            /* animation: slide-up 0.5s ease forwards; */
        }

        /* @keyframes slide-up {
            from {
                transform: translateY(2px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        } */

        .booking-title {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
        }

        .booking-input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .booking-input:focus {
            border-color: #007bff;
        }

        .booking-btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .booking-btn:hover {
            background-color: #0056b3;
        }
    </style>
<div>
    <div class="booking-container">
        <h2 class="booking-title">Book Now</h2>
        <form wire:submit.prevent="bookService()">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <input type="text" wire:model.defer="name" class="booking-input" placeholder="Name" required>
            <input type="text" wire:model.defer="description" class="booking-input" placeholder="Description" required>
            
            <select wire:model="serviceCategoryId" class="booking-input" required>
                <option value="">Select Service Category</option>
                @if($scategories)
                @foreach($scategories as $scategory)
                    <option value="{{ $scategory->id }}">{{ $scategory->name }}</option>
                @endforeach
                @endif
            </select>
            @if($sproviders)
                <select wire:model="serviceProviderId" class="booking-input" required>
                    <option value="">Select Service Provider</option>
                        @foreach($sproviders as $sprovider)
                            <option value="{{ $sprovider->id }}">{{ $sprovider->user->name }}</option>
                        @endforeach
                </select>
            @endif
            @if($services)
                <select wire:model="serviceId" class="booking-input" required>
                    <option value="">Select Service</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            @endif
            <input type="date" wire:model.defer="date" class="booking-input" required>
            <input type="time" wire:model.defer="time" class="booking-input" required>
            <button type="submit" class="booking-btn">Book Now</button>
        </form>
    </div>
</div>


</div>

