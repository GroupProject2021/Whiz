let organizationDropHeader = document.getElementById('organization-drop-down-header');
            let mentorDropHeader = document.getElementById('mentor-drop-down-header');

            function showAll() {
                organizationDropHeader.style.display = "none";
                mentorDropHeader.style.display = "none";
                
                $(".default-list").html('');
                getAllFollowerUserList();
            }

            function showStudentsOnly() {
                organizationDropHeader.style.display = "none";
                mentorDropHeader.style.display = "none";

                $(".default-list").html('');
                getFollowerUserList('Student');
            }

            function showOrganizationDropHeader() {
                organizationDropHeader.style.display = "flex";
                mentorDropHeader.style.display = "none";

                $(".default-list").html('');
                getFollowerUserList('Organization');
            }

            function showMentorDropHeader() {
                organizationDropHeader.style.display = "none";
                mentorDropHeader.style.display = "flex";

                $(".default-list").html('');
                getFollowerUserList('Mentor');
            }

            function showSpecializedActorTypeList(type) {
                $(".default-list").html('');
                getFollowerUserList(type);
            }

            function getFollowerUserList(searchText) {
                $.ajax({
                    url: URLROOT+"/profileStatsAndConnections/existingFollowerUserList/"+searchText,
                    method: 'post',
                    success: function(response) {
                        $(".default-list").html(response);
                    }
                });
            }

            function getAllFollowerUserList() {
                $.ajax({
                    url: URLROOT+"/profileStatsAndConnections/existingAllFollowerUserList",
                    method: 'post',
                    success: function(response) {
                        $(".default-list").html(response);
                        console.log(response);
                    }
                });
            }