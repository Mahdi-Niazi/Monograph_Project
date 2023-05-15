    $('#add-member').validate({
    rules: {
        firstName: {
            required: true,
        },
        lastName: {
            required: true,
        },
        email: {
            required: true,
            email: true,
        },
        phoneNumber: {  
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10
        },
        gender: {
            required: true,
        },
        nic: {
            required: true,
            minlength: 8,
            digits: true
           
        },
        position: {
            required: true,

        },
        nationality: {
            required: true,
        },
        profilePicture: {
            required: true,    
            },
        frontNic: {
            required: true,    
        },
        backNic: {
            required: true,
        }
    },
        
    });
    $('#address').validate({
        rules: {
            countryID: {
                required: true
            },
            provinceName: {
                required: true,
            },
            districtName: {
                required: true,
            }
        }
    });
    $('#education').validate({
        rules: {
            educationLevel: {
                required: true,
            },
        }
    });
    $('#business').validate({
        rules: {
            businessName: {
                required: true,
            },
            businessName: {
                required: true,
            },
            businessEmail: {
                required: true,
                email: true,
            },
            businessPhoneNumber: {
                required: true,
            },
            startingDate: {
                required: true,
            },
            startingCapital: {
                required: true,
            },
            startingCapitalCurrency: {
                required: true,
            },
            annualRevenue: {
                required: true,
            },
            AnnualRevenueCurrency: {
                required: true,
            },
            businessLogo: {
                required: true,
            }
        }
    });
    $('#bill').validate({
            rules: {
                paid: {
                    required: true,
                },
                paidDate: {
                    required: true,
                },
                registerDate: {
                    required: true,
                }
            }
            
    });
    $('#news').validate({
        rules: {
            newsTitle: {
                required: true
            },
            newsPhoto: {
                required: true
            },
            newsDate: {
                required: true
            },
            newsDescription: {
                required: true
            },
            
        }
    });
    $('#event').validate({
        rules: {
            eventName: {
                required: true,
            },
            eventDate: {
                required: true,
            },
            eventVenue: {
                required: true,
            },
            eventOrganizer: {
                required: true,
            },
            eventPhoto: {
                required: true,
            },
        }
    });
    $('#employee').validate({
        rules: {
            empName: {
                required: true,
            },
            empPosition: {
                required: true,
            },
            empEmail: {
                required: true,
                email: true
            },
            empPhoneNumber: {
                required: true,
            },
            empJoinDate: {
                required: true,
            },
            empCardNumber: {
                required: true,
            },
            empPhoto: {
                required: true, 
            }
        }
    });
    $('#editUser').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8,
            
            },
            confirmPassword: {
                minlength: 8,
                equalTo: "#password"
            }
        },
        messages: {
            confirmPassword: 'Confirm password is not the same with password!'
        }
    });
    $('#addUser').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8,
            
            },
            confirmPassword: {
                minlength: 8,
                equalTo: "#password"
            }
        },
        messages: {
            confirmPassword: 'Confirm password is not the same with password!'
        }
    });
    $('#editProfile').validate({
        rules:{
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 8,
            }
        }
    });
    $('#loginForm').validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true, 
            }
        }
    })

