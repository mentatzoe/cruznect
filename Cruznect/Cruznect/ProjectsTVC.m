//
//  ProjectsTVC.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "ProjectsTVC.h"

@interface ProjectsTVC ()

@end

@implementation ProjectsTVC

- (id)initWithStyle:(UITableViewStyle)style
{
    self = [super initWithStyle:style];
    if (self) {
        // Custom initialization
    }
    return self;
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    
    // Uncomment the following line to preserve selection between presentations.
    // self.clearsSelectionOnViewWillAppear = NO;
    
    // Uncomment the following line to display an Edit button in the navigation bar for this view controller.
    // self.navigationItem.rightBarButtonItem = self.editButtonItem;
}

- (void)didReceiveMemoryWarning
{
    [super didReceiveMemoryWarning];
    // Dispose of any resources that can be recreated.
}

#pragma mark - Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView
{
    return 1;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section
{
	return [self.projects count];
}


- (UITableViewCell *)tableView:(UITableView *)tableView cellForRowAtIndexPath:(NSIndexPath *)indexPath
{
    UITableViewCell *cell = [tableView dequeueReusableCellWithIdentifier:@"Project"
															forIndexPath:indexPath];
    
	NSDictionary *project = [self.projects objectAtIndex:indexPath.row];
	
	UIImageView *imageView = (UIImageView *)[cell viewWithTag:kImageViewTag];
	imageView.image = [CruznectRequest imageForProject:[project objectForKey:PROJECT_IMAGE]];
	UILabel *titleLabel = (UILabel *)[cell viewWithTag:kTitleTextLabelTag];
	titleLabel.text = [project objectForKey:PROJECT_NAME];
	UITextView *detailTextView = (UITextView *)[cell viewWithTag:kDetailTextViewTag];
	detailTextView.text = [project objectForKey:PROJECT_DESCRIPTION];
    
    return cell;
}

@end