@extends('layouts.mainStructure')

@section('title', 'Find Blood Donors | HemoSphere')

@section('content')
<style>
    .chat-btn {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border-radius: 25px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: background-color 0.3s;
        margin-top: 15px;
        border: none;
        cursor: pointer;
    }

    .chat-btn:hover {
        background-color: #218838;
        color: white;
        text-decoration: none;
    }
</style>

<section class="donation-section">
    <div class="donation-container">
        <!-- Search Filters -->
        <div class="search-container">
            <div class="search-header">
                <h2>Find Life Savers</h2>
                <p>Search our network of verified blood donors</p>
            </div>

            <form method="GET" action="{{ route('account.getBloodPost') }}" class="donor-search-form">
                @csrf
                <div class="search-grid">
                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fas fa-tint"></i>
                            <select name="bloodType" class="modern-select">
                                <option value="">All Blood Types</option>
                                @foreach($bloodTypes as $type)
                                <option value="{{ $type }}" {{ $selectedBloodType == $type ? 'selected' : '' }}>{{ $type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fas fa-city"></i>
                            <select name="city" class="modern-select">
                                <option value="">All Cities</option>
                                @foreach($cities as $city)
                                <option value="{{ $city }}" {{ $selectedCity == $city ? 'selected' : '' }}>{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-icon">
                            <i class="fas fa-search"></i>
                            <input type="text" name="search" placeholder="Search by name" class="modern-input">
                        </div>
                    </div>
                </div>

                <button type="submit" class="search-btn">
                    <i class="fas fa-filter"></i>
                    Find Donors
                </button>
            </form>
        </div>

        <!-- Donor Cards Grid -->
        <div class="donor-grid">
            @foreach($donors as $donor)
            <div class="donor-card">
                <div class="card-content">
                    <div class="donor-image" style="background-image: url('{{ asset('storage/' . $donor->image) }}')">
                        <div class="blood-type-badge">{{ $donor->bloodType }}</div>
                    </div>

                    <div class="donor-info">
                        <h3 class="donor-name">{{ $donor->fullName }}</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $donor->city }}</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-birthday-cake"></i>
                                <span>{{ $donor->age }} years</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-phone"></i>
                                <span>{{ $donor->phone }}</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-home"></i>
                                <span>{{ $donor->address }}</span>
                            </div>
                        </div>
                        @if($donor->message)
                        <div class="donor-message">
                            <i class="fas fa-comment"></i>
                            <p>"{{ $donor->message }}"</p>
                        </div>
                        @endif

                        <!-- Chat Button -->
                        @if($donor->user_id !== auth()->id())
                        <a href="{{ route('chat.show', $donor->user_id) }}" class="chat-btn">
                            <i class="fas fa-comment-dots"></i>
                            Chat Now
                        </a>
                    @else
                        <div class="own-post-badge">
                            <i class="fas fa-user-check"></i>
                            Your Post
                        </div>
                    @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            {{ $donors->links() }}
        </div>
    </div>
</section>

<style>
    .own-post-badge {
        background: #28a745;
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 10px;
    }
</style>
<style>
    .donation-section {
        padding: 110px 5%;
        background: linear-gradient(135deg, #0a0a1a 0%, #1a0a0a 100%);
        /* margin-top: 5rem; */
    }

    .search-container {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 2.5rem;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 46, 99, 0.3);
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 0 auto 3rem;
    }

    .search-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .search-header h2 {
        font-size: 2.5rem;
        background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .search-header p {
        color: #d1d1d1;
        font-size: 1.1rem;
    }

    .search-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .input-icon {
        position: relative;
    }

    .input-icon select option {
        color: black;
    }

    .input-icon i {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #c00a0a;
        z-index: 1;
    }

    .modern-select,
    .modern-input {
        width: 100%;
        padding: 12px 15px 12px 40px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 46, 99, 0.3);
        border-radius: 8px;
        color: #ffffff;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .modern-select:focus,
    .modern-input:focus {
        outline: none;
        border-color: #c00a0a;
        box-shadow: 0 0 0 3px rgba(192, 10, 10, 0.2);
    }

    .search-btn {
        width: 100%;
        padding: 1.2rem;
        background: #c00a0a;
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
        box-shadow: 0 4px 15px rgba(192, 10, 10, 0.3);
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(192, 10, 10, 0.4);
        background: #ff2d20;
    }

    @media (max-width: 768px) {
        .search-grid {
            grid-template-columns: 1fr;
        }

        .search-container {
            padding: 1.5rem;
            margin: 0 1rem 2rem;
        }

        .search-header h2 {
            font-size: 2rem;
        }

        .modern-select,
        .modern-input {
            padding: 10px 15px 10px 35px;
        }
    }

    @media (max-width: 480px) {
        .search-header h2 {
            font-size: 1.8rem;
        }

        .search-btn {
            padding: 1rem;
            font-size: 0.9rem;
        }
    }





    /* Donor Cards Grid */
    .donor-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        width: 100%;
        margin-left: 20px;
        margin-right: 20px;
    }

    @media (max-width: 700px) {
        .donor-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            width: 100%;
            height: 50%;
        }

        .card-content {
            padding: 0.1rem;
        }

        .donor-image {
            max-height: 250px;
        }
    }





    /* Donor Cards Grid - 1st */
    /* ya yih css likh lo pher nechy wali*/
    .donor-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        padding: 2rem 5%;
        background: linear-gradient(135deg, #0a0a1a 0%, #1a0a0a 100%);
    }

    .donor-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        padding: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(192, 10, 10, 0.3);
        backdrop-filter: blur(10px);
    }

    .donor-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(192, 10, 10, 0.2);
    }

    .donor-name {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, #fff 0%, #ff6b6b 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .info-item {
        padding: 0.8rem;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 8px;
        margin: 0.5rem 0;
        transition: transform 0.3s ease;
    }

    .info-item:hover {
        transform: translateX(10px);
    }

    .info-item i {
        color: #c00a0a;
        font-size: 1.2rem;
        margin-right: 0.8rem;
    }

    .donor-message {
        background: rgba(192, 10, 10, 0.1);
        padding: 1rem;
        border-radius: 8px;
        margin-top: 1rem;
        position: relative;
    }

    .donor-message::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 3px;
        background: #c00a0a;
    }

    @media (max-width: 768px) {
        .donor-grid {
            grid-template-columns: 1fr;
            padding: 1rem;
        }

        .donor-card {
            margin: 0.5rem;
        }
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(192, 10, 10, 0.5);
        }

        70% {
            box-shadow: 0 0 0 15px rgba(192, 10, 10, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(192, 10, 10, 0);
        }
    }

    /* Donor Cards Grid - 2nd */

    /* .donor-card {
        background: rgba(255, 255, 255, 0.05);
        border-radius: 15px;
        border: 1px solid rgba(255, 46, 99, 0.3);
        backdrop-filter: blur(10px);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .donor-card:hover {
        transform: translateY(-5px);
    }
    .card-content {
        padding: 1rem;
    } */



    /* Donor Image */
    .donor-image {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 1rem;
        height: 300px;
        /* Fixed height */
        width: 100%;
        /* Ensure full width */
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-color: #1a1a1a;
        /* Fallback color */
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .donor-image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.6) 100%);
        z-index: 1;
    }

    .blood-type-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--neon-red);
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-weight: bold;
        z-index: 2;
        /* Ensure badge stays above overlay */
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }


    .donor-info {
        color: var(--star-dust);
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        margin: 1rem 0;
    }

    .info-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .info-item i {
        color: var(--neon-red);
    }

    .donor-name {
        color: var(--neon-red);
        margin-bottom: 0.5rem;
    }

    .donor-message {
        border-top: 1px solid rgba(255, 46, 99, 0.3);
        padding-top: 1rem;
        margin-top: 1rem;
    }

    .pagination-container {
        margin-top: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination-container .pagination {
        display: flex;
        gap: 0.5rem;
    }

    .pagination-container .page-item .page-link {
        background: var(--holographic);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .pagination-container .page-item.active .page-link {
        background: var(--neon-red);
        box-shadow: 0 0 15px rgba(255, 46, 99, 0.4);
    }

    .pagination-container .page-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 46, 99, 0.4);
    }
</style>

@endsection