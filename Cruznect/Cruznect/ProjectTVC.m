//
//  ProjectTVC.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "ProjectTVC.h"
#import "CruznectRequest.h"

#define NUMBER_OF_SECTIONS 4
#define LOGO_AND_TITLE 0
#define DETAILS 1
#define REQUIREMENTS 2
#define OWNER 3
#define DELETION 4

#define kLogoImageViewTag 100
#define kTitleLabelTag 101
#define kDetailTextViewTag 102
#define kRequirementTitleTag 103
#define kRequirementQuantityTag 104
#define kOwnerLabelTag 105
#define kCreatedTimeLabelTag 106
#define kOwnerEmailTag 107

#define kLogoAndTitleCellID @"Logo and Title"
#define kDetailCellID @"Detail"
#define kRequirementCellID @"Requirement"
#define kOwnerCellID @"Owner"
#define kEmailCellID @"Email"
#define kTimeCreatedCellID @"Time Created"
#define kLearnMoreCellID @"Learn More"
#define kDeletionCellID @"Deletion"

@interface ProjectTVC ()
@property (strong, nonatomic) NSArray *requirements;
@property (strong, nonatomic) NSDictionary *owner;
@end

@implementation ProjectTVC

- (void)refresh
{
	NSString *projectID = [self.project objectForKey:PROJECT_ID];
	[self.refreshControl beginRefreshing];
	dispatch_queue_t fetchQ = dispatch_queue_create("Cruznect Fetch", NULL);
    dispatch_async(fetchQ, ^{
        self.requirements = [CruznectRequest fetchProjectRequirementsWithProjectID:projectID];
		self.owner = [CruznectRequest fetchUserWithUserID:[self.project objectForKey:PROJECT_OWNER]];
		dispatch_async(dispatch_get_main_queue(), ^{
			[self.tableView reloadData];
			[self.refreshControl endRefreshing];
		});
    });
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    
	[self.refreshControl addTarget:self
                            action:@selector(refresh)
                  forControlEvents:UIControlEventValueChanged];
    [self refresh];
	self.title = [self.project objectForKey:PROJECT_NAME];
}

#pragma mark - Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView
{
	if (self.canDeleteProject) {
		return NUMBER_OF_SECTIONS + 1;
	}
    return NUMBER_OF_SECTIONS;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section
{
	switch (section) {
		case LOGO_AND_TITLE:
			return 1;
			break;
		case DETAILS:
			return 2;
			break;
		case REQUIREMENTS:
			return [self.requirements count];
			break;
		case OWNER:
			return 3;
			break;
		case DELETION:
			if(self.canDeleteProject) return 1;
			break;
		default:
			break;
	}
	return 0;
}

- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath
{
	UITableViewCell *cell = nil;
	
    switch (indexPath.section) {
		case LOGO_AND_TITLE: {
			cell = [self.tableView dequeueReusableCellWithIdentifier:kLogoAndTitleCellID];
			UIImageView *imageView = (UIImageView *)[cell viewWithTag:kLogoImageViewTag];
			imageView.image = [CruznectRequest imageForProject:[self.project objectForKey:PROJECT_ID]];
			UILabel *titleLabel = (UILabel *)[cell viewWithTag:kTitleLabelTag];
			titleLabel.text = [self.project objectForKey:PROJECT_NAME];
			break;
		}
		case DETAILS: {
			if (indexPath.row == 0) {
				cell = [self.tableView dequeueReusableCellWithIdentifier:kDetailCellID];
				UITextView *textView = (UITextView *)[cell viewWithTag:kDetailTextViewTag];
				textView.text = [self.project objectForKey:PROJECT_DESCRIPTION];
			} else if (indexPath.row == 1)
				cell = [self.tableView dequeueReusableCellWithIdentifier:kLearnMoreCellID];
			break;
		}
		case REQUIREMENTS: {
			cell = [self.tableView dequeueReusableCellWithIdentifier:kRequirementCellID];
			UILabel *requirementTitleLabel = (UILabel *)[cell viewWithTag:kRequirementTitleTag];
			UILabel *requirementQuantityLabel = (UILabel *)[cell viewWithTag:kRequirementQuantityTag];
			
			if (self.requirements) {
				NSDictionary *requirement = [self.requirements objectAtIndex:indexPath.row];
				requirementTitleLabel.text = [[requirement objectForKey:PROJECT_REQUIRE_TALENT_NAME] description];
				requirementQuantityLabel.text = [[requirement objectForKey:PROJECT_REQUIRE_TALENT_QUANTITY] description];
			} else {
				requirementTitleLabel.text = @"N/A";
				requirementQuantityLabel.text = @"N/A";
			}
			
			break;
		}
		case OWNER: {
			if (indexPath.row == 0) {
				cell = [self.tableView dequeueReusableCellWithIdentifier:kOwnerCellID];
				UILabel *ownerNameLabel = (UILabel *)[cell viewWithTag:kOwnerLabelTag];
				ownerNameLabel.text = [self.owner objectForKey:USER_NAME];
			} else if (indexPath.row == 1) {
				cell = [self.tableView dequeueReusableCellWithIdentifier:kEmailCellID];
				UILabel *emailLabel = (UILabel *)[cell viewWithTag:kOwnerEmailTag];
				emailLabel.text = [self.owner objectForKey:USER_EMAIL];
			} else if (indexPath.row == 2) {
				cell = [self.tableView dequeueReusableCellWithIdentifier:kTimeCreatedCellID];
				UILabel *timeCreatedLabel = (UILabel *)[cell viewWithTag:kCreatedTimeLabelTag];
				timeCreatedLabel.text = [self.project objectForKey:PROJECT_CREATED_TIME];
			}
			break;
		}
		case DELETION: {
			if (self.canDeleteProject) {
				cell = [self.tableView dequeueReusableCellWithIdentifier:kDeletionCellID];
			}
			break;
		}
		default:
			return nil;
			break;
	}
	
    return cell;
}

#pragma mark - UITableViewDelegate 

- (CGFloat)tableView:(UITableView *)tableView heightForRowAtIndexPath:(NSIndexPath *)indexPath
{
	switch (indexPath.section) {
		case LOGO_AND_TITLE:
			return 132.0;
			break;
		case DETAILS:
			if (indexPath.row == 0) {
				return 132.0;
			} else if (indexPath.row == 1) {
				return 44.0;
			}
			break;
		default:
			break;
	}
	return 44;
}

@end
